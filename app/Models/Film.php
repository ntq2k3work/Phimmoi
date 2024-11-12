<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';

    protected $fillable = ['name', 'national', 'performer', 'director', 'trailer', 'description', 'avatar_img', 'poster_img','number_episodes'];

    public function category()
    {
        return $this->belongsToMany(Category::class,'film_category');
    }
}
