<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Requests\Users\UserListViewRequest;
use App\Api\Http\Requests\Users\UserStoreRequest;
use App\Api\Http\Requests\Users\UserDestroyRequest;
use App\Api\Http\Requests\Users\UserShowRequest;
use App\Api\Http\Requests\Users\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Api\Http\Requests;

use App\User;

use Bouncer;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;


/**
 * <a name="users">
 * User resource .
 * To access any of the users actions, you must be authenticated
 *
 * @Resource("Users", uri="/user")
 */
class UserController extends Controller
{
    /**
     * The bouncer class, which is a more advanced gate than laravels
     * @var \Silber\Bouncer\Bouncer $gate
     */
    protected $gate;
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    public function __construct(Bouncer $gate)
    {
        $this->gate = $gate;
        
//        if(!env("API_DEBUG",false))
          $this->middleware('api.auth');


    }

    /**
     * Get the list of all users.
     *
     * This method may not be accessible to everyone. It is considered private.
     *
     * + Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/users \\
     * --header "Authorization: bearer <[access token](#auth)>
     * --data "{}"
     * ```
     *
     * @param UserListViewRequest $request
     * @return \Illuminate\Http\Response
     * @Get("/")
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={"status": "ok" ,"payload" : "....SOmeData"})
     * @Transaction({
     *      @Title("Errors"),
     *      @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"}),
     *      @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"}),
     * })
     */
    public function index(UserListViewRequest $request)
    {
        return User::all();
    }

    /**
     * Create a new user.
     *
     * This endpoint can be considered private. Only administrators, with the right token can access this method.
     *
     * @Post("/")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("token",type="string", required=true, description="The authentification token."),
     * })
     * @Transaction({
     *      @Request({"username": "someUsername","password":"SomeSuperSecretPassword","email":"an-email@something.com"}),
     *      @Response(200,body={"status": "ok" ,"payload" : "....SOmeData"}),
     *      @Response(401, body={"status": "error", "message": "The token you provided has unauthorized access to this resource", "error":"unauthorized token"}),
     *      @Response(401, body={"status": "error", "message": "The token could not be parsed", "error":"malformed token"}),
     * })
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(UserStoreRequest $request)
    {
        $payload = $request->only("email","username","password");
        $payload["password"] = bcrypt($payload["password"]);
        dd($payload);
        $user = User::create($payload);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(UserShowRequest $request,User $user)
    {
        return $user;
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest|Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $payload = $request->only("email","username","password");
        $user->update($payload);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request,User $user)
    {
        $user->delete();
        return [];
    }
}
