<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        return Auth::user();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;
            $user->save();
        }
    }

}
