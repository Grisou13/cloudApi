<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Requests\Shares\ShareAddMemberRequest;
use App\Api\Http\Requests\Shares\ShareDestroyRequest;
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
            return Share::forUser($request->get("user"))->get();
        }
        //echo $user;
        return $user->shares()->get();
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

        $shareable = $resource_name::find($id);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareDestroyRequest $request,Share $share)
    {
        $share->delete();
        return $this->response()->noContent();
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
    public function leaveShare(Request $request,Share $share,User $user)
    {
        $share->participants()->detach($user->getKey());
        $share->save();
        return $share;
        //get the user
        //desassociate with the participants of a share
        //return
    }
    public function addToShare(ShareAddMemberRequest $request,Share $share, User $user)
    {
        //add the user to the participants
        $share->participants()->attach($user->getKey());
        $share->save();
        return $share;
        //return
    }
}
