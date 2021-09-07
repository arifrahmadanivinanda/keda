<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as Users;
use App\User;
use Validator;
use Session;
use Auth;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout(){
        $logout = Auth::user();
        return response()->json(['success' => $logout], $this->successStatus);
    }

    public function list()
    {
        $user = Users::withTrashed()
        ->where('user_type_id', 1)
        ->join('user_types', 'users.user_type_id', '=', 'user_types.id')
        ->get();
        return response()->json([$user], $this->successStatus);
    }

    public function delete($id)
    {
        $arrId = explode(',',$id);
        foreach($arrId as $ids){
            $status = Users::find($ids)->delete();
        }
        return response()->json(['success' => $arrId], $this->successStatus);
    }
}