<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Events\UserLogEntryEvent;
use App\Models\Logs;

class UserLogEntryListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserLogEntryEvent $event)
    {
        Logs::create([
            'user_id'   => $event->user_id,
            'log_entry' => $event->log_entry
        ]);
    }
}
