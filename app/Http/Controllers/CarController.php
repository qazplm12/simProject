<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all();
        return inertia('Cars/Index', ['cars' => $cars]);
    }

    // 차량 등록
    public function store(Request $request)
    {
        $car = new Car();
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->registration_number = $request->registrationNumber;
        $car->year = $request->year;
        $car->color = $request->color;

//        $car->save();
//        ^^^^ 500에러 발생. 해결하지 못했음

        return response()->json(['message' => '차량 등록 성공.'], 201);
    }

    public function show(Car $car)
    {
        return inertia('Cars/Show', ['car' => $car]);
    }

}
