<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'menu_id',
        'user_id',
        'quantity',
        'total_price',
        'status',
        'snap_token',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setStatusPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }

    public function setStatusSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }

    public function setStatusFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }

    public function setStatusExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
}
