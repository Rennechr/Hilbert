<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\Room\CreateRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function response;

class RoomsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }
    public function getRooms()
    {
        return Room::all();
    }
    public function addRoom(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'description' => 'required|string',
            'total_beds' => 'required|numeric',
            'class' => 'required|string|max:255',
            'prize' => 'required|numeric'
        ]);

        if( !$validator->fails()){

            $createRoom = new CreateRoom( $request->all() );
            $newRoom = $createRoom->save();
            return response()->json( $newRoom, 201 );
        }

        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }
}
