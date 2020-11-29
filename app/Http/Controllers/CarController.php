<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Auth;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /** show cars */
    public function index(){
        $cars=Car::simplePaginate(request('perPage', 5));

        return view('index',['cars'=>$cars]);


    }

    /** redirect method
     */
    public function create(){
        return view('create');
    }


    public function store(Request $request){

        $request->validate([
            'make' => 'required|min:2|max:15',
            'model' => 'required|min:2|max:15',
            'produced_on' => 'required'
        ]);
        Car::create($request->all());

        $request->session()->flash('status','car was succesfully added');

        return redirect()->route('cars.index');



    }

    /**
     *redirect to edit
     */
    public function edit($car_id){

        $car=Car::findOrFail($car_id);

        return view('edit',[
            "car" => $car
        ]);


    }
    /**
     *updating
     */
    public function update($car_id){

        $car=Car::findOrFail($car_id);
        $car->make = request()->input('make');
        $car->model = request()->input('model');
        $car->produced_on = request()->input('produced_on');
        $car->update();

        return redirect()->route('cars.index');


    }
    /**
     *deleting
     */
    public function destroy($car_id){
        Car::destroy($car_id);


        return redirect()->route('cars.index');


    }

}
