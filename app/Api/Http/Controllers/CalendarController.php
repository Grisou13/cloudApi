<?php

namespace App\Api\Http\Controllers;
use App\Api\Http\Requests\Calendars\CalendarListViewRequest;
use App\Api\Http\Requests\Calendars\CalendarStoreRequest;
use App\Api\Http\Requests\Calendars\CalendarUpdateRequest;
use App\Calendar;
use Dingo\Api\Contract\Http\Request;

/**
 * Calendar resource repsientation
 *
 * @Resource("Calendar", uri="/v1/calendar")
 */
class CalendarController extends Controller
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
     * Display all the calendars for a user.
     *
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/calendar
     * ```
     *
     * @Get("/")
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,body={
          "status": "ok" ,
          "payload" :{
          {
                "id": "1",
                "owner_id": "1",
                "title": "My awesome new calendar",
                "created_at": "2016-04-14 23:49:52",
                "updated_at": "2016-04-14 23:49:52",
                "deleted_at": null,
                "events": {{

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

                }}
          }}

      })
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param CalendarListViewRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(CalendarListViewRequest $request)
    {
        return $this->user()->calendars()->with("events")->get();
    }


    /**
     * Store a newly created calendar in storage.
     *
     * #### Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/v1/calendar \\
     * --data "{\"title\":\"something new\"}"
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarStoreRequest $request)
    {
        $payload = $request->get(["title"]);
        $calendar = new Calendar($payload);
        $calendar->owner()->associate($this->user());
        $calendar->save();
        return $this->response()->created(app('Dingo\Api\Routing\UrlGenerator')->version("v1")->route("api.v1.calendar.show",$calendar),$calendar);
    }

    /**
     * Display the specified resource.
     *
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/v1/calendar/1
     * ```
     *
     * @Get("/{calendar}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"calendar":"1"})
     * @Response(200,body={
            "status": "ok" ,
            "payload" :{
            {
            "id": "1",
            "owner_id": "1",
            "title": "My awesome new calendar",
            "created_at": "2016-04-14 23:49:52",
            "updated_at": "2016-04-14 23:49:52",
            "deleted_at": null,
            "events": {{

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

            }}
            }}

      })
     *
     * @Response(200,headers={"location":"http://ricci.cpnv-es.ch/api/v1/calendar/1"})
     *
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        return $calendar->with("events")->get()[0];//simple manipulation, because "get" returns a collection, whcih then transforms to an array
    }

    /**
     * Update calendar.
     *
     * #### Example
     * ```
     * curl -X PATCH http://ricci.cpnv-es.ch/api/v1/calendar/1 \\
     * --data "{\"title\":\"a new title\"}"
     * ```
     *
     * @Patch("/{calendar}")
     * @Parameters({
     *   @Parameter("calendar", description="The id of the calendar you want to view",required=true)
     * })
     * @Versions({"v1"})
     * @Request({"title":"a new title"})
     * @Response(200,body={
            "status": "ok" ,
            "payload" :
            {
            "id": "1",
            "owner_id": "1",
            "title": "a new title",
            "created_at": "2016-04-14 23:49:52",
            "updated_at": "2016-04-14 23:49:52",
            "deleted_at": null,

            }

        })
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalendarUpdateRequest $request, Calendar $calendar)
    {
        $payload = $request->get(["title"]);
        $calendar->update(array_merge($calendar->toArray(),$payload));
        $calendar->saveOrFail();
        return $calendar;

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
     * @Request({})
     * @Response(204)
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @Response(404, body={"status":"error","payload":"not found Calendar"})
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return $this->response->noContent();
    }

    public function share(Request $request,Calendar $calendar)
    {
        return ;
    }
}
