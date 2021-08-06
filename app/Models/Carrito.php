<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class Carrito extends Model
{

    use HasFactory;

    protected $table = 'carritos';
    protected $fillable = [
        'status',
        'customId',
    ];

    public function checka()
    {
        $this->slug_update();
    }

    public function order()
    {
        return $this->hasOne(Order::class)->first();
    }

    public function genSlug()
    {
        $value= "$this->id $this->updated_at";

        return md5($value);
    }

    public function slug_update()
    {
        $this->status=1;
        $this->customId = $this->genSlug();
        $this->save();
    }


    public function carrito_card()
    {
        return $this->hasMany(Carrito_Cards::class);
    }

    public function card()
    {
        return $this->belongsToMany(Card::class, 'carrito_card');
    }

    public function productSize()
    {
        return $this->card()->sum('inventario');
    }

    public function total()
    {
        $r = $this->card()->get();
        $s=0;
        foreach ($r as $buy){

        $s += $buy->price*Carrito_Card::where('carrito_id', $buy->pivot->carrito_id)->where('card_id', $buy->pivot->card_id)->first()->inventario;
        
        }

        return $s;
    }

    public static function findOrCreateBySessionId($carrito_id)
    {
        if ($carrito_id) {
            return Carrito::findBySession($carrito_id);

        }else {
            # crear carrito
            return Carrito::createWitchoutSession();
        }
    }

    public static function findBySession($carrito_id)
    {
        return Carrito::find($carrito_id);
    }

    public static function createWitchoutSession()
    {

        return Carrito::create([
            'status' => 0
        ]);

    }
}
