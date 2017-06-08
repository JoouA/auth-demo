<?php
/**
 * Created by PhpStorm.
 * User: 24922
 * Date: 2017/6/8
 * Time: 9:48
 */

namespace App\Mailer;


class UserMailer extends Mailer
{
    public function welcome($user){
        echo "I am welcome";
        $subject = 'Welcome to laravel';
        $view = 'eamils.welcome';
        $data = ['name'=>$user->name,'token'=>$user->token];
        $this->sendTo($user,$subject,$view,$data);
    }
}