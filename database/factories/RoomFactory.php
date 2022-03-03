<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'description' => $this->faker->text(),
            'total_beds' => 1,
            'class' => 0,
            'prize' => $this->faker->text( 300 ),
        ];
    }
}
