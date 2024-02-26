<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // 예약

    public function store(Request $request, Car $car)
    {
        // 요청 유효성 검사
        $request->validate([
            'startDate' => 'required|date',
            'startTime' => 'required',
            'endDate' => 'required|date',
            'endTime' => 'required',
        ]);

        // 새로운 예약 생성
        $reservation = new Reservation();
        $reservation->car_id = $request->carId;
        $reservation->start_date = $request->startDate;
        $reservation->start_time = $request->startTime;
        $reservation->end_date = $request->endDate;
        $reservation->end_time = $request->endTime;
//        $reservation->save();

        // 성공 응답 반환
        return response()->json(['message' => '예약 성공.'], 201);
    }
}
