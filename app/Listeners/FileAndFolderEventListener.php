<?php

namespace App\Listeners;

use App\Events\ResourceAdded;
use App\File;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileAndFolderEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResourceAdded  $event
     * @return void
     */
    /*public function handle(ResourceAdded $event)
    {
        //
    }*/
    /*protected function handleFileSaved(File $file)
    {
        $file->
    }*/
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            'eloquent.saved: File',
            'App\Listeners\UserEventListener@handleUserCreated'
        );
    }
}
