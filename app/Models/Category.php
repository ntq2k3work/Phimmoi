<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';


    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'name',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i d-m-Y'); // Định dạng ngày
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i d-m-Y'); // Định dạng ngày
    }
}
