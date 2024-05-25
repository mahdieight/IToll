<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_address',
        'source_lat',
        'source_long',
        'destination_address',
        'destination_lat',
        'destination_long',
        'sender_name',
        'sender_mobile',
        'receiver_name',
        'receiver_mobile',
        ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
