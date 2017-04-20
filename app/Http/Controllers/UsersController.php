<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function storeUser(){

    $rules = [
      'name'  => 'required',
      'email' => 'required',
      'password' => 'required',
    ];

    $user= new User;
    $user->name =
    $request->input('name');
    $user->email =
    $request->input('email');
    $user->password =
    $request->input('password');

    $user->save();

    return Response::json(['success' => 'user registered']);
  }

  public function (Request $request) {

    $rules = [
      'email' => 'required',
      'password' => 'required',
    ];


  }




}
