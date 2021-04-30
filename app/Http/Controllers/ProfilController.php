<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function show($id)
    {
        return view('profils.show');
    }

    public function updateFirstname(Request $request, $id)
    {
        $data = $request->validate([
            'firstname' => ['required', 'string'],
        ]);

        $user = User::where('id', $id)->first();
        $user->firstname = $data['firstname'];
        $user->save();

        return back();
    }

    public function updateLastname(Request $request, $id)
    {
        $data = $request->validate([
            'lastname' => ['required', 'string'],
        ]);

        $user = User::where('id', $id)->first();
        $user->lastname = $data['lastname'];
        $user->save();

        return back();
    }

    public function updateEmail(Request $request, $id)
    {
        $data = $request->validate([
            'email' => ['required', 'string'],
        ]);

        $user = User::where('id', $id)->first();
        $user->email = $data['email'];
        $user->save();

        return back();
    }

    public function updatePicture(Request $request, $id)
    {
        $data = $request->validate([
            'email' => ['required', 'string'],
        ]);

        $user = User::where('id', $id)->first();
        $user->email = $data['email'];
        $user->save();

        return back();
    }
}
