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
                $query-where("id","=",$user->id);
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
            //retrive input
            $folder = dirname($request->input("filename"));
            $filename = basename($request->input("filename"));
            $user = $this->auth()->user();
            //create the modal
            $file = new File();
            $file->owner()->associate($user);
            $file->folder = $folder?$folder:$filename;//automatically will take the dirname()
            $file->filename = $filename;
            $file->storage_path=$this->repository->buildPath($file->full_path);
            $file->saveOrFail();

            //move the uplaoded file
            $f = $request->file("upload");
            $f->move($file->storage_path);
            Storage::drive()->copy($f->getPath(),$file->full_path);
            $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("file.show",$file));
            return ["file"=>$file];
        }
        else{
            throw new HttpException("file not valid");
        }


    }
    public function move(Request $request)
    {
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($request->get("to"));
        $this->repository->move($from,$to);
    }
    public function addFolder(Request $request)
    {
        $path = $request->get("path");
        $this->repository->makeDirectory($path);
    }
    public function share(Request $request,File $file)
    {
        //$share = new Share();
        $file->shares()->create(["users"=>[$this->auth()->user()]]);
    }
    public function tree(Request $request)
    {
        $path = $this->repository->buildPath($request->get("path"));
        $storage = Storage::disk(Storage::getDefaultDriver());
        return array_merge($storage->directories($path),$storage->files($path));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
