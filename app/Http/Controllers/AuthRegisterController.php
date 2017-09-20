<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthSignRequest;
use App\User;
use Illuminate\Http\Request;

class AuthRegisterController extends Controller
{
    public function store(AuthSignRequest $request){
         $data = [
             'name'=>$request->get('name'),
             'email'=>$request->get('email'),
             'password'=> bcrypt($request->get('password')),
             'remember_token'=>$request->get('_token')
         ];
        // 将数据写入到数据库中
        User::zhuche($data);
//         echo $data['name'];

        return redirect()->route('success',$data['name']);

    }
}
