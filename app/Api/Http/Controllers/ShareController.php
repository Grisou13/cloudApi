<?php

namespace App\Api\Http\Controllers;

use App\Api\Repositories\FileRepository;
use App\Directory;
use App\Share;
use App\User;
use App\File;
use App\Contact;
use App\Calendar;
use App\CalendarEvent;

use Bouncer;
use Dingo\Api\Exception\ResourceException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Http\Request;
use Illuminate\Support\Str;

class ShareController extends Controller
{
    /**
     * @var string
     */
    protected $modelNamespace = '\\App\\';
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
        $this->repository = $repo;
        $this->middleware('api.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $this->user();
        if($request->has("user") && Bouncer::allows("view-others-shares",$user))//admins can see others people files
        {
            dd("asdsg");
            return Share::whereHas("owner",function($query) use ($request){
                $user = $request->get("user");
                $query->where("id","=",$user);
            })->get();
        }
        //echo $user;
        return $user->shares()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if(!class_exists($resource_name = $this->modelNamespace.Str::studly($request->get("resource"))))
            $resource_name = Str::studly($request->get("resource"));
        elseif(class_exists($request->get("resource")))
            $resource_name = $request->get("resource");

        $id = $request->get("id");

        try{
            $shareable = $resource_name::find($id);
        }catch(\Exception $e){

            //if the ressource is a Directory and the Dir model wasn't created (we don't create a directory for every insertion of files...common db would be in pain)
            //a directory is dimacly created, allowing the db to not be overwlemed with requests, everytime a file is put in a directory
            if($resource_name == Directory::class)
            {
                $path = $request->get("path");
                //if the directory path already exists and we can find it
                if(! $shareable = Directory::find(["path"=>$path]))
                {
                    //maybe we can create it ?
                    if($this->repository->exists($path))
                    {

                        $shareable = Directory::create(["path"=>$path]);
                        $shareable->owner()->associate($this->user());
                        $shareable->save();
                    }
                }
            }
            throw $e;//just throw the exception
        }


        $user_id = $request->get("user");
        //$user = User::findOrFail($user_id);
        $share = new Share();
        $share->shareable()->associate($shareable);
        $share->owner()->associate($this->user());

        if($share->save()){
            $share->participants()->attach($user_id);
            return $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.share.show",$share),$share);
        }else{
            throw new StoreResourceFailedException("could not create share");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        return $share;
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
    public function ownedShares(User $user)
    {
        return $user->shares();
    }
    public function inShares(User $user)
    {
        return Share::whereHas("participants",function($query) use ($user){
            $query->where("id","=",$user->id);
        })->get();
    }
    public function leaveShare()
    {
        //get the user
        //desassociate with the participants of a share
        //return
    }
    public function addToShare(Request $request)
    {
        //add the user to the participants
        //return
    }
}
