<?php

namespace App\Api\Http\Controllers;


use App\Api\Http\Requests\Files\FileShowRequest;
use App\Api\Http\Requests\Files\FileStoreRequest;
use App\Api\Repositories\FileRepository;
use App\File;
use App\Share;
use Bouncer;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use League\Flysystem\Util;
use Storage;
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
        //$repo->setUser($this->user());
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
                $query-where("id","=",$user);
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

            $user = $this->auth()->user();
            //create the modal
            $file = new File();
            $file->owner()->associate($user);

            $file->filepath = $filepath;
            $file->storage_path=storage_path($this->repository->buildPath($file->full_path));

            $file->saveOrFail();
            //move the uplaoded file
            $f = $request->file("upload");
            $directory = storage_path($this->repository->buildPath($file->folder));
            if($f->move($directory,$file->filename))
            {
                //Storage::drive()->copy($f->getPath(),$file->full_path);
                return $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.file.show",$file),$file);
                return ["file"=>$file];
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
    public function copy(Request $request)
    {
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($request->get("to"));
        $this->repository->copy($from,$to);
        return $this->response()->accepted();
    }
    public function move(Request $request)
    {
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($request->get("to"));
        $this->repository->move($from,$to);
        return $this->response()->accepted();
    }
    public function addFolder(Request $request)
    {
        $path = $request->get("path");
        if($this->repository->makeDirectory($path))
            return $this->response->accepted();
        throw new HttpException("could not create folder");
    }
    public function deleteFolder(Request $request)
    {
        $path = $request->get("path");
        if($this->repository->deleteDirectory($path))
            return $this->response->accepted();
        throw new HttpException("could not delete folder");
    }
    public function share(Request $request,File $file,User $user)
    {
        $file->shares()->create(["participants"=>[$user]]);
        dd($file);
        return $this->response->created();
    }
    public function tree(Request $request)
    {
        $path = $this->repository->buildPath($request->get("path"));
        $storage = Storage::disk(Storage::getDefaultDriver());
        return array_merge($this->repository->directories($path),$this->repository->files($path));
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

        $this->repository->delete($file->storage_path);
    }
}
