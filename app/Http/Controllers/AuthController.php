<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;


class AuthController extends Controller
{
    /**
     * @var TymonJWTAuthJWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'username'    => 'required',
            'password' => 'required',
        ]);
        if (! $token = $this->jwt->attempt($request->only('username', 'password'))) {
            return response()->json(['user_not_found'], 404);
        }
        $data=User::where('username','=',$request->username)->first();
        $result['data']=$data;
        return response()->json([
            'status'=>'success',
            'code'=>200,
            'auth'=>compact('token'),
            'result'=>$result
        ]);
    }
}