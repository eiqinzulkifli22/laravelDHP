<?php

namespace App\Http\Controllers\Api;

use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'idNumber' => 'required',
            'fullName' => 'required',
            'centre' => 'required',
            'emailAddress' => 'required',
            'phoneNumber' => 'required',
            'barcodeNumber' => 'required|unique:users,barcode_no',
            'pin' => 'required',
        ]);

        if ($validator->fails()) {
            if(User::where('barcode_no', request('barcodeNumber'))->count() > 0) {
                return ['success' => false, 'message' => 'User already exists.'];
            }
            else {
                return ['success' => false, 'message' => 'Invalid request.'];
            }
        }

        $user = User::create(
            [
                'matric_no' => request('idNumber'),
                'name' => request('fullName'),
                'centre' => request('centre'),
                'email' => request('emailAddress'),
                'phone_no' => request('phoneNumber'),
                'barcode_no' => request('barcodeNumber'),
                'password' => Hash::make(request('pin'))
            ]
        );

        $user['token'] = $user->createToken(env('APP_NAME'))->accessToken;

        return ['success' => true, 'user' => $user];
    }

    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'barcodeNumber' => 'required',
            'pin' => 'required',
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'message' => 'Invalid request.'];
        }

        $user = User::where('barcode_no', request('barcodeNumber'))->first();

        if($user != null && Hash::check(request('pin'), $user->password)) {
            return ['success'=> true, 'token' => $user->createToken(env('APP_NAME'))->accessToken];
        }

        return ['success' => false, 'message' => 'Invalid credentials.'];
    }
}
