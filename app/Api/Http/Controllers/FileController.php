<?php

namespace App\Api\Http\Controllers;


use App\Api\Http\Requests\Files\FileShowRequest;
use App\Api\Http\Requests\Files\FileStoreRequest;
use App\Api\Repositories\FileRepository;
use App\Directory;
use App\File;
use App\Share;
use Bouncer;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use League\Flysystem\Util;
use Storage;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * @property FileRepository repository
 */
class FileController extends Controller
{
    /**
     * @var FileRepository
     */
    protected $repository;
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct(FileRepository $repo)
    {
        $this->middleware('api.auth');
        $this->repository = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $this->user();
        if($request->has("user") && Bouncer::allows("view-others-files",$user))//admins can see others people files
            return File::with("shares")->whereHas("owner",function($query) use ($request){
                $user = $request->get("user");
                $query->where("id","=",$user);
            })->get();
        //echo $user;
        return $user->files()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileStoreRequest $request)
    {
        //$driver = $request->get("storage","local");

        //$file = $request->file("upload");
        //$this->repository->create(compact("filename","folder","file"));

        if($request->file("upload")->isValid()) {
            //var_dump($this->user());

            $filepath = $request->input("filepath");
            $pathinfo = Util::pathinfo($filepath);
            $user = $this->auth()->user();
            //create the modal
            $file = new File();
            $file->owner()->associate($user);
            $dir = Directory::where("path",$pathinfo["dirname"])->first();
            if(!$dir->count())
                throw new BadRequestHttpException("directory does not exist");
            $file->filename = $pathinfo["basename"];
            $file->folder()->associate($dir);

            $file->saveOrFail();
            //move the uplaoded file
            $f = $request->file("upload");
            $directory = dirname($file->storage_path);
            if($f->move($directory,$file->filename))
            {
                return $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.file.show",$file),$file);
            }
            else
            {
                throw new HttpException("could not move file");
            }
        }
        else{
            throw new HttpException("file not valid");
        }


    }

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function copy(Request $request)
    {
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($request->get("to"));
        $this->repository->copy($from,$to);
        return $this->response()->accepted();
    }

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function move(Request $request)
    {
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($request->get("to"));
        $this->repository->move($from,$to);
        return $this->response()->accepted();
    }

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function addFolder(Request $request)
    {
        $path = $request->get("path");
        if($this->repository->makeDirectory($path))
            return $this->response->accepted();
        throw new HttpException("could not create folder");
    }

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function deleteFolder(Request $request)
    {
        $path = $request->get("path");
        if($this->repository->deleteDirectory($path))
            return $this->response->accepted();
        throw new HttpException("could not delete folder");
    }

    /**
     * @param Request $request
     * @param File $file
     * @return mixed
     */
    public function share(Request $request,File $file)
    {
        return $this->api->with(["resource"=>File::class,"id"=>$file->id,"user"=>$request->get("users")])->post("/api/v1/share");
    }

    /**
     * @param Request $request
     * @param Directory $dir
     * @return mixed
     */
    public function shareFolder(Request $request,Directory $dir)
    {
        return $this->api->with(["resource"=>Directory::class,"id"=>$dir->id,"user"=>$request->get("users")])->post("share");
    }

    /**
     * @param Request $request
     * @return array
     */
    public function tree(Request $request)
    {
        //dd($request->get("path"));
        $path = $this->repository->buildPath($request->get("path"));
        $user = $this->user();
        /*foreach($this->repository->directories($path) as $dir){
            $dirs[]=[
                "type"=>"directory",
                "filename"=>$dir
            ];
        }*/
        $dirs = Directory::where("path",$path)->get();
        $files = File::where("folder",$path)->get();
        /*$shares = Share::with("owner")->whereHas("owner",function($query) use ($user){return $query->where("owner_id",'=',$user->id);});
        $shares = $shares->groupBy("shareable_type");
        foreach($shares as $share){
            switch(get_class($share->shareable))
            {
                case "App\\Directory":
                    $dirs->push(array_merge($share->shareable->toArray(),["type"=>"shareable_directory"]));
                    break;
                /*case "App\\File":
                    $files->push(array_merge($share->shareable,["type"=>"shareable_file"]));
                    break;*//*
            }
        }*/
        return array_merge($dirs->toArray(),$files->toArray());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FileShowRequest $request,File $file)
    {
        return $file;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        if( $request->hasFile("upload") && $request->file("upload")->isValid() )
            $this->repository->put($file->storage_path,$request->file("upload"));
        if($request->has("content"))
            $this->repository->put($file->storage_path,$request->get("content"));
        return $this->response->accepted();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        $this->repository->delete($file->storage_path);
    }
}
