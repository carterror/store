<?php

namespace Database\Factories;

use App\Models\Carrito;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarritoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Carrito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "status" => 0,
        ];
    }
}
