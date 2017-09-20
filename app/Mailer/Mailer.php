<?php
/**
 * Created by PhpStorm.
 * User: 24922
 * Date: 2017/6/7
 * Time: 23:35
 */

namespace App\Mailer;

use Illuminate\Support\Facades\Mail;

class Mailer
{
    public function sendTo($user,$subject,$view,$data = []){

        echo "sendEmail";

        Mail::send($view,$data,function($message) use($user,$subject){
                $message->to($user->email)->subject($subject);
        } );
    }
}