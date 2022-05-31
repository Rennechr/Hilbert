<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'bookings';
    /**
     * @var mixed
     */
    protected $fillable = [
        'room_id',
        'user_id',
        'from',
        'to',
        'pension',
    ];
}
