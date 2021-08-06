<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable= [
        "name",
        "product_pag",
        "phone",
        "current",
        "fb",
        "ig",
        "wa",
        "tg",
        "descript",
        "descript2",
    ];
}
