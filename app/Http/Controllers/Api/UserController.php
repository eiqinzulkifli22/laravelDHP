<?php

namespace App\Http\Controllers\Api;

use Hash;
use Mail;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TacRequested;
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
                return ['success' => false, 'message' => 'User already exist.'];
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
                'password' => Hash::make(request('pin','required|min.6'))
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

    public function details()
    {
        return auth()->user();
    }

    public function logout()
    {
        if(auth()->check()) {
            auth()->user()->token()->revoke();
            return ['success'=> true];
        }
        
        return ['success'=> false];
    }

    public function requestTAC()
    {
        $validator = Validator::make(request()->all(), [
            'barcodeNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'message' => 'Invalid request.'];
        }

        $user = User::where('barcode_no', request('barcodeNumber'))->first();

        if($user == null) {
            return ['success' => false, 'message' => 'Invalid barcode number.'];
        }

        $user->update(['tac' => rand(100000, 999999)]);
        Mail::to($user)->send(new TacRequested($user));

        return ['success' => true];
    }

    public function changePassword()
    {
        $validator = Validator::make(request()->all(), [
            'barcodeNumber' => 'required',
            'pin' => 'required',
            'tac' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'message' => 'Invalid request.'];
        }

        $user = User::where('barcode_no', request('barcodeNumber'))
            ->where('tac', request('tac'))->first();

        if($user == null) {
            return ['success' => false, 'message' => 'User not found.'];
        }

        $user->update([
            'password' => Hash::make(request('pin')),
            'tac' => null,
        ]);

        return ['success' => true, 'message' => 'Your PIN has been changed!.'];
    
    }

    



}
