<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito_Card extends Model
{
    protected $table = 'carrito_card';

    protected $fillable = [
        'card_id',
        'inventario',
        'carrito_id'
    ];

    public static function productsCount($carrit_id)
    {
        return Carrito_Card::where('carrito_id', $carrit_id)->sum('inventario');
    }
}
