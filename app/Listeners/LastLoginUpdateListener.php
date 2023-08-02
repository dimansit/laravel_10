<?php

namespace App\Listeners;

use App\Models\User;

class LastLoginUpdateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (isset($event->user) && $event->user instanceof User) {
            $event->user->last_login_at = now();
            $event->user->save();
        }
    }
}
