<?php

namespace App\Listeners;

use App\Events\WelcomeUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;

class WelcomeUserListener
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
    public function handle(WelcomeUserEvent $event): void
    {
        $user = $event->user;
        Mail::to($user->email)->send(new WelcomeUserMail($user));
    }
}
