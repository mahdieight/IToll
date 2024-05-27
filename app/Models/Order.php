<?php

namespace App\Models;

use App\Enums\Order\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'status',
        'trip_id',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];


    public function trip(): belongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function getRouteKeyName(): string
    {
        return 'tn';
    }
}
