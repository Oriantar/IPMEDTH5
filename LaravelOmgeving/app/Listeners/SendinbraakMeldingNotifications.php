<?php

namespace App\Listeners;

use App\Events\InbraakMeldingCreated;
use App\Models\sensorids;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        
    }
}
