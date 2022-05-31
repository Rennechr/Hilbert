<?php

namespace App\Services\Room;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class CreateRoom
{
    private $data;

    public function __construct( $newRoomData )
    {
        $this->data = $newRoomData;
    }
    public function save(): Room
    {
        $room = new Room();
        $room->description = $this->data['description'];
        $room->total_beds = $this->data['total_beds'];
        $room->class = $this->data['class'];
        $room->prize = $this->data['prize'];
        $room->save();
        return $room;
    }
}
