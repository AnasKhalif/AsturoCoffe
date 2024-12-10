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
        $this->status = 'pending';
        $this->save();
    }

    public function setStatusSuccess()
    {
        $this->status = 'success';
        $this->save();
    }

    public function setStatusFailed()
    {
        $this->status = 'failed';
        $this->save();
    }

    public function setStatusExpired()
    {
        $this->status = 'expired';
        $this->save();
    }
}
