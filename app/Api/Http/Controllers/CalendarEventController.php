<?php

namespace App\Api\Http\Controllers;

use App\Calendar;
use App\CalendarEvent;
use Dingo\Api\Contract\Http\Request;

/**
 * Class CalendarEventController
 * @package App\Api\Http\Controllers
 * @Resource("CalendarEvent", uri="/v1/calendar/{calendar}/event")
 */
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
     * Display a listing of calendar events.

     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/calendar/1/event
     * ```
     *
     * @Get("/")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={
    "status": "ok" ,
    "payload" :{
        {

        "id": "1",
        "uid": "950b14c0-029b-11e6-b188-d375626a8db0",
        "calendar_id": "1",
        "summary": "Eius sit omnis praesentium et quibusdam provident sapiente.",
        "description": "Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt.",
        "location": "6345 Coralie Estates Apt. 820\nWizaton, ID 97717",
        "start_date": "2016-04-13 09:52:45",
        "end_date": "2016-04-17 05:20:23",
        "status": "ACCEPTED",
        "created_at": "2016-04-14 23:49:52",
        "updated_at": "2016-04-14 23:49:52",
        "deleted_at": null

        }
    }

    })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *

     * @return \Illuminate\Http\Response
     */
    public function index(Calendar $calendar)
    {
        return $calendar->events()->getResults();
    }


    /**
     * Store a newly created calendar event in storage.
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/calendar/1/event \\
     * --data "{\"title\":\"something new\"}"
     * ```
     *
     * @Post("/")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"summary":"a title name or something","description":"this is an optional field","location":"optional field","start_date":"2016-04-13 09:52:45","end_date":"2016-04-17 05:20:23"})
     * @Response(200,body={
        "status": "ok" ,
        "payload" : {
            "id": "1",
            "uid": "950b14c0-029b-11e6-b188-d375626a8db0",
            "calendar_id": "1",
            "summary": "Eius sit omnis praesentium et quibusdam provident sapiente.",
            "description": "Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt.",
            "location": "6345 Coralie Estates Apt. 820\nWizaton, ID 97717",
            "start_date": "2016-04-13 09:52:45",
            "end_date": "2016-04-17 05:20:23",
            "status": "ACCEPTED",
            "created_at": "2016-04-14 23:49:52",
            "updated_at": "2016-04-14 23:49:52",
            "deleted_at": null
        }
        })
     * @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/calendar/1/event/1"})
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request,Calendar $calendar)
    {
        $payload = $request->get(["summary","description","location","start_date","end_date"]);
        $event = new CalendarEvent($payload);
        $event->calendar()->associate($calendar);
        $event->save();
        return $this->response()->created($this->linkTo("api.v1.calendar.event.show",$event),$event);
    }

    /**
     * Display an event resource.
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/calendar1/event/1
     * ```
     *
     * @Post("/{event}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true),
     *   @Parameter("event", description="The id of the event you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"calendar":1,"event":1})
     * @Response(200,body={
        "status": "ok" ,
        "payload" : {
            "id": "1",
            "uid": "950b14c0-029b-11e6-b188-d375626a8db0",
            "calendar_id": "1",
            "summary": "Eius sit omnis praesentium et quibusdam provident sapiente.",
            "description": "Aut perferendis error itaque quam. Quia enim saepe et ut eum tempore est. Repellat dolores veniam harum minus commodi nesciunt.",
            "location": "6345 Coralie Estates Apt. 820\nWizaton, ID 97717",
            "start_date": "2016-04-13 09:52:45",
            "end_date": "2016-04-17 05:20:23",
            "status": "ACCEPTED",
            "created_at": "2016-04-14 23:49:52",
            "updated_at": "2016-04-14 23:49:52",
            "deleted_at": null
        }
        })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     * @Response(404, body={"status":"error","payload":"not found CalendarEvent"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarEvent $event)
    {
        return $event;
    }


    /**
     * Update the specified resource in storage.
     * #### Example
     * ```
     * curl -X PATCH http://ricci.cpnv-es.ch/api/v1/calendar/1/event/1 \\
     * --data "{\"summary\":\"new summary\",\"description\":\"new description\",\"location\":\"new location\",\"start_date\":\"2016-05-14 09:00:00\",\"end_date\":\"2016-05-14 12:00:00\"}"
     * ```
     *
     * @Patch("/{event}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to update",required=true),
     *   @Parameter("event", description="The id of the event you want to update",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"summary":"new summary","description":"new description","location":"new location","start_date":"2016-05-14 09:00:00","end_date":"2016-05-14 12:00:00"})
     * @Response(200,body={
        "status": "ok" ,
        "payload" :
        {
            "id": "1",
            "uid": "950b14c0-029b-11e6-b188-d375626a8db0",
            "calendar_id": "1",
            "summary": "new summary",
            "description": "a new description",
            "location": "a new location",
            "start_date": "2016-05-14 09:00:00",
            "end_date": "2016-05-14 12:00:00",
            "status": "ACCEPTED",
            "created_at": "2016-04-14 23:49:52",
            "updated_at": "2016-04-14 23:49:52",
            "deleted_at": null
        }

        })
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     * @Response(404, body={"status":"error","payload":"not found CalendarEvent"})
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
     * #### Example
     * ```
     * curl -X DELETE http://ricci.cpnv-es.ch/api/v1/calendar/1/event/1
     * ```
     *
     * @Delete("/{event}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to update",required=true),
     *   @Parameter("event", description="The id of the event you want to update",required=true)
     * })
     * @Versions({"v1"})
     * @Request({})
     * @Response(204)
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     * @Response(404, body={"status":"error","payload":"not found CalendarEvent"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $event)
    {
        $event->delete();
        return $this->response()->noContent();
    }

    public function share(Request $request, CalendarEvent $event)
    {
        return ;
    }
}
