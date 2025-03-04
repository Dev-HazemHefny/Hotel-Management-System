<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'room_id',
        'user_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function room()
{
    return $this->belongsTo(Room::class);
}
}
