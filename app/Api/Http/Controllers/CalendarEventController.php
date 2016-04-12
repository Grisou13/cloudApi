<?php

namespace App\Api\Http\Controllers;

use App\Calendar;
use App\CalendarEvent;
use Dingo\Api\Contract\Http\Request;

class CalendarEventController extends Controller
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
    public function index(Calendar $calendar)
    {
        return $calendar->events()->getResults();
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
    public function store(Request $request,Calendar $calendar)
    {
        $payload = $request->get(["summary","description","location","start_date","end_date"]);
        $event = new CalendarEvent($payload);
        $event->calendar()->associate($calendar);
        $event->save();
        return $this->response()->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.calendar.event.show",$event),$event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarEvent $event)
    {
        return $event;
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
    public function update(Request $request, CalendarEvent $event)
    {
        $payload = $request->get(["summary","description","location","start_date","end_date"]);
        $event->update(array_merge($event->toArray(),$payload));
        $event->save();
        return $this->response()->accepted(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.calendar.event.show",$event),$event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $event)
    {
        $event->delete();
        return $this->response()->noContent();
    }
}
