<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->id <> $id)            
            return route('home');
        else
        {
            $user = User::find($id);
            return view('users.edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);                
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_check' => 'required'
        ]);

        if ($request->password != $request->password_check)
        {
            return redirect()->route('users.edit', compact('user'))->with('error', 'wachtwoorden zijn niet gelijk!');
        }

        $user->fill($request->post())->save();

        return redirect()->route('home.index')->with('succes', 'gebruiker is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
