<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rental;
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
        return view('client.createAccount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userStore(UserRequest $request)
    {
         $formFields = $request->validated();
         $formFields['password'] = Hash::make($request->password);
        User::create($formFields);
        return to_route('login.show')->with('success','Your Account was created successfully!');
        // // return to_route('homepage');
        // dd($request->validated());

    }

    /**
     * Display the specified resource.
     */
    public function viewProfile()
    {
        $user = Auth::user();


        return view('client.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */




    public function userRentals()
    {

        $rentals = Rental::where('user_id', Auth::id())->get();
        return view('client.myreservation', compact('rentals'));
    }

    public function cancelRental(Rental $rental)
    {
        // $rental = Rental::findOrFail($id);
        // dd($rental);
        if($rental->status == "pending"){

            $rental->update(['status' => 'canceled']);
            $rental->car->update(['available' => true]);
            return redirect()->back()->with('success', 'Rental canceled successfully');
        }
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroyUserByAdmin($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
         $user->delete();

        return redirect()->route('listUsers')->with('success_del','User deleted successfully');
    }
}
