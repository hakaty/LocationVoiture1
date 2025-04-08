<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RentalController extends Controller
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
    public function confirmRental(Rental $rental)
    {
        // $rental = Rental::findOrFail($id);
        // dd($rental);
         $rental->update(['status' => 'confirmed']);

         return redirect()->back()->with('success', 'Rental confirmed successfully');
    }

    public function cancelRental(Rental $rental)
    {
        // $rental = Rental::findOrFail($id);
        // dd($rental);
         $rental->update(['status' => 'canceled']);
         $rental->car->update(['available' => true]);

         return redirect()->back()->with('success', 'Rental canceled successfully');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(Auth::user()->type == 1){
            return redirect()->back()->with('error', "Your account is an admin account. Please connect with a client account.");
        }


        $request->validate([
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after:rental_date',
            'price' => 'required|numeric',
            'car_id' => 'required|exists:cars,id',
            'car_brand' => 'required|string',

        ]);


            Rental::create([
                'rental_date' => $request->rental_date,
                'return_date' => $request->return_date,
                'price' => $request->price,
                'user_id' => Auth::user()->id,
                'car_id' => $request->car_id,
                'car_brand' => $request->car_brand,
                'car_photo' => Car::find($request->car_id)->photo
            ]);

            $car = Car::find($request->car_id);
            if ($car) {
                $car->update(['available' => false]);
            }else{
                $car->update(['available' => true]);
            }

            return redirect()->route('car.index')->with('success', 'Car booked successfully! Check Your Reservation!');

    }

    public function destroyRental($id)
    {
         $rental = Rental::findOrFail($id);
        //  $car = $rental->car ;
        //  dd($car);
         if ($rental->car) {
            $rental->car->available = true;
            $rental->car->save();
        }
         $rental->delete();
        // dd($rental);
        return redirect()->route('listRental');
    }




    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
