<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignUpRequest;
use App\User;
use Request;


class UsersController extends Controller
{
    public  function store(UserSignUpRequest $request ){
//        dd($request->all());
//          dd(Request::all()  );
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'token'=>$request->get('_token')
        ];

        // 将数据写到数据库中
        //User::create($data);
        User::register($data);

            /*
            echo url('/success');
            // 都是返回到相关的路径当中
            return redirect(url('/success'));
            return redirect('/success');*/

          return  view('eamils.welcome',$data);

    }

}
