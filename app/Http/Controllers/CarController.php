<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Requests\CarRequest;
use App\Http\Requests;
use App\Http\Controllers\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('client.cars' , compact('cars'));
    }

    public function showDetails($name)
    {
        $cars = Car::all();
        $car = null;
        foreach($cars as $c){
            if($c->brand == $name){
                $car = $c;
                break;
            }
        }

        return view('client.detailscar',compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $formFields = $request->validated();
        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('cars','public');
        }
        // dd($formFields);
        Car::create($formFields);
        return to_route('listCars')->with('success','Car was added successfully');;
    }



    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {

        return view('admin.editcar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {

        $formFields = $request->validated();
        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('cars','public');
        }
        $car->fill($formFields)->save();
         return to_route('listCars')->with('success','Car Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('listCars')->with('success_del','Car is deleted successfuly');
    }

    public function listCarsAd(){
        $cars = Car::all();
        return view('admin.listcars' , compact('cars'));
    }
}
