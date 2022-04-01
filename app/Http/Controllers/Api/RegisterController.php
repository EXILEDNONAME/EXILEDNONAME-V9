<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController {

  public function login(Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
      $user = Auth::user();
      $success['token'] = $user->createToken('My Token')-> accessToken;
      $success['name'] = $user->name;

      return $this->sendResponse($success, 'User login successfully.');
    }
    else{
      return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    }
  }

}
