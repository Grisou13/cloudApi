<?php

namespace App\Api\Http\Controllers;

//use Illuminate\Http\Request;

use App\Api\Http\Requests\Directories\DirectoryCopyRequest;
use App\Api\Http\Requests\Directories\DirectoryMoveRequest;
use App\Api\Repositories\FileRepository;
use Dingo\Api\Contract\Http\Request;
use App\Directory;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DirectoryController
 * @package App\Api\Http\Controllers
 * @Resource("Directories", uri="/v1/directory")
 */
class DirectoryController extends Controller
{
    protected $repository;

    public function __construct(FileRepository $repo)
    {
        $this->middleware("api.auth");
        $this->repository = $repo;
    }
    

    /**
     * Gets the list of all the users directories
     *
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/directory
     * ```
     * @Get("/")
     * @Version({"v1"})
     * @Request({})
     * @Response(200,body={
    "status": "ok",
    "payload": {
    "id": 1,
    "owner_id": "1",
    "parent_id": null,
    "path": "/",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:45",
    "deleted_at": null,
    "files": {
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
    },
    "storage_path": "/",
    "type": "directory",
    "name": "",
    "children": {
    {
    "id": 2,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/molestiae",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:46",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/molestiae",
    "type": "directory",
    "files": {
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
    },
    "name": "molestiae"
    },
    {
    "id": 3,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/architecto",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/architecto",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "architecto"
    },
    {
    "id": 4,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/quo",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/quo",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "quo"
    },
    {
    "id": 5,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/aut",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/aut",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "aut"
    },
    {
    "id": 6,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/dolore",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/dolore",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "dolore"
    }
    }
    }
    })
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404,body={"status":"error","message":"could not find directory for path : /something/non/existant"})
     *
     * @return array
     */
    public function index()
    {
        $ret = new Collection([]);
        $dirs = Directory::forUser($this->user())->get();
        foreach($dirs as $k => $dir)
        {
            $tmp = $dir->toArray();
            //if($dir->path=="/") continue;
            //var_dump($dir->id);
            $tmp["children"] = Directory::where("parent_id",$dir->id)->get();//Directory::forUser($this->user())->where("parent_id",$dir->id);//search for children directories on only 1 level
            $ret[]=$tmp;
        }
        return $ret->toArray();
    }

    /**
     * Store a new directory
     *
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/directory \\
     * --data "{"path": "\/test"}"
     * ```
     *
     * @Post("/")
     * @Versions({"v1"})
     * @Request({"path": "/test"})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :{
        "id": 10,
        "owner_id": "1",
        "parent_id": 1,
        "path": "/test",
        "created_at": "2016-04-14 23:49:45",
        "updated_at": "2016-04-14 23:49:45",
        "deleted_at": null,
        "files":{}
     }
    })
     *  @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/directory/1"})
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->only(["path"]);
        //get parent directory
        $parentPath = str_replace("\\","/",dirname($request->get("path")));
        $parentDirectory = Directory::forUser($this->user())->where("path",$parentPath)->first();
        //dd([$parentPath,$parentDirectory]);
        $dir = new Directory($payload);
        $dir->parent()->associate($parentDirectory);
        $dir->owner()->associate($this->user());
        if($dir->save()){
            $this->repository->makeDirectory($dir->app_path);
        }
        return $this->response()->created($this->linkTo("api.v1.directory.show",$dir),$dir);

    }

    /**
     * Show a specific directory resource
     *
     * @Get("/{directory}")
     * @Parameter("directory", description="The id of the calendar you want to view",required=true)
     * @Versions({"v1"})
     * @Request({"directory":"1"})
     * @Response(200,body={
    "status": "ok",
    "payload": {
    "id": 1,
    "owner_id": "1",
    "parent_id": null,
    "path": "/",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:45",
    "deleted_at": null,
    "files": {
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
    },
    "storage_path": "/",
    "type": "directory",
    "name": "",
    "children": {
    {
    "id": 2,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/molestiae",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:46",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/molestiae",
    "type": "directory",
    "files": {
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
    },
    "name": "molestiae"
    },
    {
    "id": 3,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/architecto",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/architecto",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "architecto"
    },
    {
    "id": 4,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/quo",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/quo",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "quo"
    },
    {
    "id": 5,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/aut",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/aut",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "aut"
    },
    {
    "id": 6,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/dolore",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/dolore",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "dolore"
    }
    }
    }
    })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Directory"})
     * @param Request $request
     * @param Directory $directory
     * @return mixed
     */
    public function show(Request $request, Directory $directory)
    {
        $children = \App\Directory::children($directory->id)->get();
        //dd([$directory,$children->toArray()]);
        return(array_add($directory->toArray(),"children",$children));
    }
    /**
     * Lists all directories in a specified path

     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/tree
     * ```
     * @Get("/tree{?path}")
     * @Version({"v1"})
     * @Parameter("path",description="The folder you want to get a listing of",required=true)
     * @Request({"path":"/"})
     * @Response(200,body={
    "status": "ok",
    "payload": {
    "id": 1,
    "owner_id": "1",
    "parent_id": null,
    "path": "/",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:45",
    "deleted_at": null,
    "files": {
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
    },
    "storage_path": "/",
    "type": "directory",
    "name": "",
    "children": {
    {
    "id": 2,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/molestiae",
    "created_at": "2016-04-14 23:49:45",
    "updated_at": "2016-04-14 23:49:46",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/molestiae",
    "type": "directory",
    "files": {
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
    },
    "name": "molestiae"
    },
    {
    "id": 3,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/architecto",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/architecto",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "architecto"
    },
    {
    "id": 4,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/quo",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/quo",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "quo"
    },
    {
    "id": 5,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/aut",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/aut",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "aut"
    },
    {
    "id": 6,
    "owner_id": "1",
    "parent_id": "1",
    "path": "/dolore",
    "created_at": "2016-04-14 23:49:46",
    "updated_at": "2016-04-14 23:49:47",
    "deleted_at": null,
    "storage_path": "/app/user_data/id_1/dolore",
    "type": "directory",
    "files": {
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
    }
    },
    "name": "dolore"
    }
    }
    }
    })
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404,body={"status":"error","message":"could not find directory for path : /something/non/existant"})

     * @param Request $request
     * @return array
     */
    public function tree(Request $request)
    {
        $path = $request->get("path");
        $user = $this->user();

        $dir = \App\Directory::forUser($user)->where("path",$path)->first();
        if($dir == null)
            throw new NotFoundHttpException("could not find directory for path : {$path}");

        $children = \App\Directory::children($dir->id)->get();
        return(array_add($dir->toArray(),"children",$children));
    }
    /**
     * Update a directory
     *
     * This can be seen as a move operation, it is prefered you use the `move` method
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/directory/10 \\
     * --data "{"path": "\/another_place"}"
     * ```
     *
     * @Patch("/{directory}")
     * @Parameter("directory", description="The id of the directory you want to destroy",required=true,type="integer")
     * @Versions({"v1"})
     * @Transaction({
        @Request({"path": "/test"}),
        @Response(200,body={
        "status": "ok" ,
        "payload" :{
        "id": 10,
        "owner_id": "1",
        "parent_id": 1,
        "path": "/another_place",
        "created_at": "2016-04-14 23:49:45",
        "updated_at": "2016-04-14 23:49:45",
        "deleted_at": null,
        "files":{}
        }
        }),
        @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/directory/1"}),
        @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * })
     * @param Request $request
     * @param Directory $dir
     */
    public function update(Request $request,Directory $dir)
    {
        $payload = $request->get(["path"]);
        $beforePath = $dir->path;
        $dir->update(array_merge($dir->toArray(),$payload));
        $dir->save();
        $this->repository->move($beforePath,$dir->path);
    }

    /**
     * Delete a directory
     * #### Example
     * ```
     * curl -X DELETE http://ricci.cpnv-es.ch/api/v1/directory/10
     * ```
     *
     * @Delete("/{directory}")
     * @Parameters({
     *   @Parameter("directory", description="The id of the directory you want to destroy",required=true)
     * })
     * @Versions({"v1"})
     * @Transaction({
     * @Request({}),
     * @Response(204),
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"}),
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"}),
     * @Response(404, body={"status":"error","payload":"not found Calendar"}),
     * })
     * @param Request $request
     * @param Directory $dir
     * @return \Dingo\Api\Http\Response
     * @throws \Exception
     */
    public function delete(Request $request,Directory $dir)
    {
        $dir->delete();
        $this->repository->delete($dir->path);
        return $this->response->noContent();
    }

    public function copy(DirectoryCopyRequest $request)
    {

    }
    public function move(DirectoryMoveRequest $request)
    {

    }
    public function share(Request $request,Directory $dir)
    {
        return $this->api->with(["resource"=>Directory::class,"id"=>$dir->id,"user"=>$request->get("users")])->post("share");
    }
}
