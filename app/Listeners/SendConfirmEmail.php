<?php

namespace App\Listeners;

use App\Events\AuthRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendConfirmEmail
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
     * @param  AuthRegister  $event
     * @return void
     */
    public function handle(AuthRegister $event)
    {
        $view ='eamils.welcome';
        $user = $event->get();
        $subject = 'Confirm to the register email';
        $data = ['name'=>$user->name,'token'=>$user->remember_token];
        Mail::send($view,$data,function($message) use($user,$subject) {
            $message->to($user->email)->subject($subject);
        });
    }
}
