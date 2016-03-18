<?php

namespace App\Listeners;


use App\Api\Repositories\FileRepository;
use Dingo\Api\Auth\Auth;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventListener
{
    /**
     * Create the event listener.
     *
     * @param FileRepository $repo
     */
    public function __construct(FileRepository $repo)
    {
        $this->repository = $repo;
    }

    /**
     * @param $user
     */
    public function handleUserCreated($user)
    {
        $this->repository->setUser($user);//set the newly created user to
        var_dump($this->repository);
        $this->repository->createBaseDirectoryForUser();
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            'eloquent.created: User',
            'App\Listeners\UserEventListener@handleUserCreated'
        );
    }

}
