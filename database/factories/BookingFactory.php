<?php

namespace Database\Factories;
use App\Models\Booking;



class BookingFactory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'room_id' => 1,
            'user_id' => 1,
            'from' => "03.08.22",
            'to' => "08.08.22",
            'pension' => "halbpension",
        ];
    }
}
