<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Rental;
use App\Models\Car;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(User $user , Rental $rental , Car $car)
     {
        // users
        $users = User::all();
        $totalUsers = $users->count();

        // cars
        $cars = Car::all();
        $totalCars = $cars->count();

        //rental
        $rental = Rental::all();
        $totalRentals = $rental->count();

         return view('admin.dashboardAdmin',compact('totalUsers','totalCars','totalRentals'));
     }
     public function listOfUsers(){
        $users = User::all();
        return view('admin.listusers' , compact('users'));
    }

    public function editUser( User $user)
    {
        return view('admin.editAccount',compact('user'));
    }

    public function updateUser(UserRequest $request, User $user)
    {

        $formFields = $request->validated();

        $user->fill($formFields)->save();
        return to_route('listUsers')->with('success','User was updated successfully!');

    }

    public function updateProfile(UserRequest $request, User $user)
    {

        $formFields = $request->validated();

        if(empty($formFields['password'])){
            unset($formFields['password']);
        }else{
            $formFields['password'] = bcrypt($formFields['password']);
        }

        $user->fill($formFields)->save();
        return to_route('user.profile')->with('success','Your profile was updated successfully!');

    }


    public function destroyUser($id , Rental $rental)
    {
        $user = User::findOrFail($id);
        // dd($user);
         $user->delete();

        return redirect()->route('listUsers')->with('success_del','User deleted successfully');
    }



    public function listCarsAd(){
        $cars = Car::all();
        return view('admin.listcars' , compact('cars'));
    }

    public function listRental(){
        $rentals = Rental::all();
        return view('admin.listrentals' , compact('rentals'));
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
