<?php

namespace App\Api\Http\Controllers;


use App\Api\Http\Requests\Files\FileShowRequest;
use App\Api\Http\Requests\Files\FileStoreRequest;
use App\Api\Http\Requests\Files\FileUpdateRequest;
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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @property FileRepository repository
 * @Resource("Files",uri="/v1/file")
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

     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/contact
     * ```
     *
     * @Get("/")
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={
    "status": "ok",
    "payload": {
    {
    "id": 1,
    "owner_id": "1",
    "folder_id": "2",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:46",
    "deleted_at": null,
    "type": "file",
    "path": "/molestiae/image.jpg",
    "storage_path": "/app/user_data/id_1/molestiae/image.jpg",
    "name": "image.jpg"
    },
    {
    "id": 2,
    "owner_id": "1",
    "folder_id": "3",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:47",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "type": "file",
    "path": "/architecto/image.jpg",
    "storage_path": "/app/user_data/id_1/architecto/image.jpg",
    "name": "image.jpg"
    },
    {
    "id": 3,
    "owner_id": "1",
    "folder_id": "4",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:47",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "type": "file",
    "path": "/quo/image.jpg",
    "storage_path": "/app/user_data/id_1/quo/image.jpg",
    "name": "image.jpg"
    },
    {
    "id": 4,
    "owner_id": "1",
    "folder_id": "5",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:47",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "type": "file",
    "path": "/aut/image.jpg",
    "storage_path": "/app/user_data/id_1/aut/image.jpg",
    "name": "image.jpg"
    },
    {
    "id": 5,
    "owner_id": "1",
    "folder_id": "6",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:47",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "type": "file",
    "path": "/dolore/image.jpg",
    "storage_path": "/app/user_data/id_1/dolore/image.jpg",
    "name": "image.jpg"
    },
    {
    "id": 6,
    "owner_id": "1",
    "folder_id": "1",
    "storage": "local",
    "filename": "something.jpg",
    "created_at": "2016-04-14 23:49:47",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "type": "file",
    "path": "/something.jpg",
    "storage_path": "/something.jpg",
    "name": "something.jpg"
    }
    }
    }
    )
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
     * Create new file.
     *
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/calendar \\
     * --data "{\"filepath\":\"/some/file/to/upload.txt\"}" \\
     * -F upload=@/some/file/to/upload.txt
     * ```
     *
     * @Post("/")
     * @Versions({"v1"})
     * @Request({"title":"a title name or something"})
     * @Response(200,body={
    "status": "ok" ,
    "payload" : {
    "id": "1",
    "owner_id": "1",
    "title": "My awesome new calendar",
    "created_at": "2016-04-14 23:49:52",
    "updated_at": "2016-04-14 23:49:52",
    "deleted_at": null,
    }
    })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404,body={"status": "error","payload":"The directory [directory] for the file [file] does not exist. You must create it first at http://ricci.cpnv-es.ch/api/v1/directory"})
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
            $dir = Directory::forUser($this->user())->where("path",str_replace("\\","/",$pathinfo["dirname"]))->first();
            if(!$dir->count())
                throw new NotFoundHttpException("The directory {$pathinfo["dirname"]} for the file ({$filepath})does not exist. You must create it first at http://ricci.cpnv-es.ch/api/v1/directory");
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
        $to = $request->get("to");
        $pathinfo = Util::pathinfo($to);
        $toDirectory = Directory::forUser($this->user())->where("path",$pathinfo["dirname"])->first();

        if(!$toDirectory->count())
            throw new NotFoundHttpException("The directory {$pathinfo["dirname"]} for the file ($to})does not exist. You must create it first at http://ricci.cpnv-es.ch/api/v1/directory");
        $from = $request->get("from");
        $fromFile = File::forUser($this->user())->where("path",$from)->first();
        if(!$fromFile->count())
            throw new NotFoundHttpException("The file {$from} does not exist");
        $fromFile->folder()->associate($toDirectory);//reassociate the directory to the new one where the file is copied
        $from = $this->repository->buildPath($request->get("from"));
        $to = $this->repository->buildPath($to);
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
     * @param File $file
     * @return mixed
     */
    public function share(Request $request,File $file)
    {
        return $this->api->with(["resource"=>File::class,"id"=>$file->id,"user"=>$request->get("users")])->post("/api/v1/share");
    }

    /**
     * Display the specified resource.
     *
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/file/1
     * ```
     *
     * @Get("/{file}")
     * @Parameters({
     *   @Parameter("file", description="The id of the file you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"file":"1"})
     * @Response(200,body={
    "status": "ok" ,
    "payload" : {
        "id": 1,
        "owner_id": "1",
        "folder_id": "2",
        "storage": "local",
        "filename": "image.jpg",
        "created_at": "2016-04-14 23:49:46",
        "updated_at": "2016-04-14 23:49:46",
        "deleted_at": null,
        "type": "file",
        "path": "/molestiae/image.jpg",
        "storage_path": "/app/user_data/id_1/molestiae/image.jpg",
        "name": "image.jpg"
    }

    })
     *
     * @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/file/1"})
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found File"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FileShowRequest $request,File $file)
    {
        return $file;
    }


    /**
     * Update a file content
     *
     * #### Example
     * ```
     * curl -X PATCH http://ricci.cpnv-es.ch/api/v1/file/1 \\
     * -F upload @/my/new/file/content/for/file_id_1.txt
     * ```
     *
     * @Patch("/{file}")
     * @Parameters({
     *   @Parameter("file", description="The id of the file you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"upload":"@FileContent"})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :
    {
    "id": 1,
    "owner_id": "1",
    "folder_id": "2",
    "storage": "local",
    "filename": "image.jpg",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:46",
    "deleted_at": null,
    "type": "file",
    "path": "/molestiae/image.jpg",
    "storage_path": "/app/user_data/id_1/molestiae/image.jpg",
    "name": "image.jpg"
    }

    })
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found File"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileUpdateRequest $request, File $file)
    {
        if( $request->hasFile("upload") && $request->file("upload")->isValid() )
            $this->repository->put($file->storage_path,$request->file("upload"));

        return $this->response->accepted();
    }

    /**
     * Delete file
     *
     * #### Example
     * ```
     * curl -X DELETE http://ricci.cpnv-es.ch/api/v1/file/1
     * ```
     *
     * @Delete("/{file}")
     * @Parameters({
     *   @Parameter("file", description="The id of the file you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({})
     * @Response(204)
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found File"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        $this->repository->delete($file->storage_path);
        $this->response->noContent();
    }

}
