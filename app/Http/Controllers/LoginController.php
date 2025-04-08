<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
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
    public function show()
    {
        return view('client.login');
    }

    public function login( Request $request)
    {
        $email = $request->email ;
        $password = $request->password;
        $credentials = ['email' => $email ,  "password" => $password];

       if( Auth::attempt($credentials)){

            $user = Auth::user();
                if ($user->type == 1) {
                    return to_route('dashboard.admin');
                }
                
            $request->session()->regenerate();
            return to_route('home.index');
       }else{
            return back()->withErrors([
                'email' => 'Email ou password incorrect.'
            ])->onlyInput('email');
       }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('home.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
