<?php

namespace App\Listeners;

use App\Events\InbraakMeldingCreated;
use App\Models\sensorids;
use App\Notifications\NewInbraakMelding;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\inbraakMelding;
use App\Models\User;

class SendinbraakMeldingNotifications implements ShouldQueue
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
    public function handle(InbraakMeldingCreated $event): void
    {
        foreach (User::whereNot('id', $event->inbraakMelding->user_id)->cursor() as $user) {
            $user->notify(new NewInbraakMelding($event->inbraakMelding));
    }
}
}