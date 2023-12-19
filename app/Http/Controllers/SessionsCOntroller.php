<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;
use App\Http\Requests\sessionRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class SessionsCOntroller extends Controller
{
    // public function store(Request $request) {   //how to do something if validation failed
    //     $attributes = $request->validate([
    //         'mobile_number' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $user = Pharmacist::where('mobile_number',$attributes['mobile_number'])->get();
    //     //check if exists first ^-^
    //     if ($user->count()) {
    //         $name = $user[0]['name'];
    //     }
    //     else {
    //         return response()->json(['message' => 'invalid information']);
    //     }

    //     //dd([$request['password'],$name]);
    //     if (! auth()->attempt(['password' => $request['password'],'name' => $name])) {
    //         return response()->json(['message' => 'invalid information']);
    //     }


    //     return response()->json(['message' => 'success']);
    // }

    public function store(sessionRequest $myRequest) {
        //dd($myRequest);
        $myRequest->validate;

        $attributes = $myRequest->all();
        //dd($attributes);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['error'=> 'your provided credentials cannot be verified .']);
        }

        session()->regenerate();

        return response()->json(['message' => 'success']);
    }

    public function create(sessionRequest $myRequest) {

        $myRequest->validate;

        $attributes = $myRequest->all();
        //dd($attributes);
        $user = User::create($attributes);

        auth()->login($user);

        return response()->json(['message' => 'success']);
    }
}
