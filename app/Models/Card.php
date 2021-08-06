<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{    
    protected $fillable = [
        'name',
        'path',
        'type',
        'public',
        'description',
        'description_pre',
        'price',
    ];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'type');
    }

    public function Galeria()
    {
        return $this->hasMany(Gallery::class, 'producto_id', 'id');
    }
}
