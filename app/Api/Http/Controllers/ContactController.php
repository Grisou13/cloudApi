<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Requests\Contacts\ContactDestroyRequest;
use App\Api\Http\Requests\Contacts\ContactShowRequest;
use App\Api\Http\Requests\Contacts\ContactStoreRequest;
use App\Api\Http\Requests\Contacts\ContactUpdateRequest;
use App\Contact;
use Dingo\Api\Contract\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class ContactController
 * @package App\Api\Http\Controllers
 * @Resource("Contact", uri="/v1/contact")
 */
class ContactController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api.auth');
    }
    /**
     * Display a listing of the resource.

     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/contact
     * ```
     *
     * @Get("/")
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :{
        {
            "id": 1,
            "owner_id": "1",
            "name": "Monty Conn",
            "photo": "http://lorempixel.com/640/480/?16928",
            "emails": {
            "work": "oconn@koch.info",
            "private": "ngoldner@leannon.net"
            },
            "addresses": {
            "work": "8075 Hamill Roads\nBartonburgh, OH 84588",
            "private": "5337 Junius Falls\nWest Russ, MS 29489-4985"
            },
            "phoneNumbers": {
            "work": "112-373-4580",
            "private": "+99(2)9748549210"
            },
            "company": "Watsica, Schmeler and Boyer",
            "job_title": "Ms.",
            "created_at": "2016-04-14 23:49:53",
            "updated_at": "2016-04-14 23:49:53",
            "deleted_at": null,
            "owner": {
            "id": 1,
            "username": "Admin",
            "email": "thomas.ricci@cpnv.ch",
            "created_at": "2016-04-14 23:49:45",
            "updated_at": "2016-04-14 23:49:45",
            "deleted_at": null
        }
    }
    }

    })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *

     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->user()->contacts;
    }


    /**
     * Store a newly created resource in storage.
     *
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/contact \\
     * --data "{"name": "Monty Conn","photo": "http://lorempixel.com/640/480/?16928","emails": {"work": "oconn@koch.info","private": "ngoldner@leannon.net"},"addresses": {"work": "8075 Hamill Roads\nBartonburgh, OH 84588","private": "5337 Junius Falls\nWest Russ, MS 29489-4985"},"phoneNumbers": {"work": "112-373-4580","private": "+99(2)9748549210"},"company": "Watsica, Schmeler and Boyer", "job_title": "Ms."}"
     * ```
     *
     * @Post("/")
     * @Versions({"v1"})
     * @Request({"name": "Monty Conn","photo": "http://lorempixel.com/640/480/?16928","emails": {"work": "oconn@koch.info","private": "ngoldner@leannon.net"},"addresses": {"work": "8075 Hamill Roads\nBartonburgh, OH 84588","private": "5337 Junius Falls\nWest Russ, MS 29489-4985"},"phoneNumbers": {"work": "112-373-4580","private": "+99(2)9748549210"},"company": "Watsica, Schmeler and Boyer", "job_title": "Ms."})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :
     {
        "id": 1,
        "owner_id": "1",
        "name": "Monty Conn",
        "photo": "http://lorempixel.com/640/480/?16928",
        "emails": {
            "work": "oconn@koch.info",
            "private": "ngoldner@leannon.net"
        },
        "addresses": {
            "work": "8075 Hamill Roads\nBartonburgh, OH 84588",
            "private": "5337 Junius Falls\nWest Russ, MS 29489-4985"
        },
        "phoneNumbers": {
            "work": "112-373-4580",
            "private": "+99(2)9748549210"
        },
        "company": "Watsica, Schmeler and Boyer",
        "job_title": "Ms.",
        "created_at": "2016-04-14 23:49:53",
        "updated_at": "2016-04-14 23:49:53",
        "deleted_at": null,

    }
    })
     *  @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/contact/1"})
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $payload = $request->only(["name","photo","emails","addresses","phoneNumbers","company","job_title"]);
        //dd($payload);
        $contact = new Contact($payload);
        if($contact->save())
            throw new BadRequestHttpException("could not create contact");
        return $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.contact.show",$contact),$contact);
    }

    /**
     * Display the specified contact resource.
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/contact/1
     * ```
     *
     * @Get("/{contact}")
     * @Parameters({
     *   @Parameter("contact", description="The id of the contact you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :{
        "id": 1,
        "owner_id": "1",
        "name": "Monty Conn",
        "photo": "http://lorempixel.com/640/480/?16928",
        "emails": {
        "work": "oconn@koch.info",
        "private": "ngoldner@leannon.net"
        },
        "addresses": {
        "work": "8075 Hamill Roads\nBartonburgh, OH 84588",
        "private": "5337 Junius Falls\nWest Russ, MS 29489-4985"
        },
        "phoneNumbers": {
        "work": "112-373-4580",
        "private": "+99(2)9748549210"
        },
        "company": "Watsica, Schmeler and Boyer",
        "job_title": "Ms.",
        "created_at": "2016-04-14 23:49:53",
        "updated_at": "2016-04-14 23:49:53",
        "deleted_at": null,
    }

    })
     *
     * @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/contact/1"})
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactShowRequest $request, Contact $contact)
    {
        return $contact;
    }


    /**
     * Update the specified resource in storage.
     *
     * You are not obligated to provide every field to update the resource. Only it's id is required
     * #### Example
     * ```
     * curl -X PATCH http://ricci.cpnv-es.ch/api/v1/contact/1
     * ```
     *
     * @Patch("/{contact}")
     * @Parameters({
     *   @Parameter("contact", description="The id of the contact you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"contact":"1","name": "new name","photo": "http://lorempixel.com/640/480/?16928","emails": {"work": "oconn@koch.info","private": "ngoldner@leannon.net"},"addresses": {"work": "8075 Hamill Roads\nBartonburgh, OH 84588","private": "5337 Junius Falls\nWest Russ, MS 29489-4985"},"phoneNumbers": {"work": "112-373-4580","private": "+99(2)9748549210"},"company": "Watsica, Schmeler and Boyer", "job_title": "Ms."})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :{
    "id": 1,
    "owner_id": "1",
    "name": "new name",
    "photo": "http://lorempixel.com/640/480/?16928",
    "emails": {
    "work": "oconn@koch.info",
    "private": "ngoldner@leannon.net"
    },
    "addresses": {
    "work": "8075 Hamill Roads\nBartonburgh, OH 84588",
    "private": "5337 Junius Falls\nWest Russ, MS 29489-4985"
    },
    "phoneNumbers": {
    "work": "112-373-4580",
    "private": "+99(2)9748549210"
    },
    "company": "Watsica, Schmeler and Boyer",
    "job_title": "Ms.",
    "created_at": "2016-04-14 23:49:53",
    "updated_at": "2016-04-14 23:49:53",
    "deleted_at": null,
    }

    })
     *
     * @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/contact/1"})
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Contact"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $original = clone $contact;
        $payload = $request->only(["name","photo","emails","addresses","pnoneNumbers","company","job_title"]);
        $contact->update(array_merge($contact->toArray(),$payload));
        if($original->toArray() !== $contact->toArray())//if the data has changed save it
            $contact->save();
        return $this->response->accepted(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.contact.show",$contact),$contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * #### Example
     * ```
     * curl -X DELETE http://ricci.cpnv-es.ch/api/v1/calendar/1
     * ```
     *
     * @Delete("/{calendar}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Transaction({
         * @Request({}),
         * @Response(204),
         * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"}),
         * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"}),
         * @Response(404, body={"status":"error","payload":"not found Calendar"})
     * })
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactDestroyRequest $contact)
    {
        $contact->delete();
        return $this->response->noContent();
    }

    public function share(Request $request,Contact $contact)
    {
        $contact->shares()->create(["users"=>[$request->get("user")]]);
        return $this->response->created();
    }
}
