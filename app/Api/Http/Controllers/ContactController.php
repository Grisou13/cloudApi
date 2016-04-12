<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Requests\Contacts\ContactDestroyRequest;
use App\Api\Http\Requests\Contacts\ContactShowRequest;
use App\Api\Http\Requests\Contacts\ContactStoreRequest;
use App\Api\Http\Requests\Contacts\ContactUpdateRequest;
use App\Contact;
use Dingo\Api\Contract\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->user()->contacts()->get();
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
    public function store(ContactStoreRequest $request)
    {
        $payload = $request->only(["name","photo","emails","addresses","pnoneNumbers","company","job_title"]);
        dd($payload);
        $contact = new Contact($payload);
        if($contact->save())
            throw new BadRequestHttpException("could not create contact");
        return $this->response->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.contact.show",$contact),$contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactShowRequest $contact)
    {
        return $contact;
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
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $payload = $request->only(["name","photo","emails","addresses","pnoneNumbers","company","job_title"]);
        $contact->update(array_merge($contact->toArray(),$payload));
        return $this->response->accepted(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.contact.show",$contact),$contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactDestroyRequest $contact)
    {
        $contact->delete();
        return $this->response->accepted();
    }

    public function share(Request $request,Contact $contact)
    {
        $contact->shares()->create(["users"=>[$request->get("user")]]);
        return $this->response->created();
    }
}
