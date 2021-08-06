<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'name',
        'carrito_id', 
        'address',
        'phone',
        'email',
        'status',
        'total'
    ];

    public static function createOrden($response, $carrito)
    {
        return Order::create([
            'name' => $response->name,
            'carrito_id' => $carrito->id,
            'address' => $response->address,
            'phone' => $response->phone,
            'total' => $carrito->total(),
        ]);
    }
}
