<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'series_id', 'price', 'description', 'image'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
