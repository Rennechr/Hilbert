<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Services\Room\CreateRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }
    public function book(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'room_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'pension' => 'required|string|max:255',
        ]);

        if( !$validator->fails()){
            $booking = new Booking();
            $booking->room_id = $request['room_id'];
            $booking->user_id = $request['user_id'];
            $booking->from = $request['from'];
            $booking->to = $request['to'];
            $booking->pension = $request['pension'];
            $booking->save();
            return response()->json( $booking, 201 );
        }

        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }
}
