<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_name',
        'city',
        'checkin_date',
        'checkout_date',
        'user_id',
    ];
    public function room()
{
    return $this->belongsTo(Room::class, 'room_id'); // nếu là 'phong_id' thì sửa lại
}
public function user()
{
    return $this->belongsTo(User::class);
}

}