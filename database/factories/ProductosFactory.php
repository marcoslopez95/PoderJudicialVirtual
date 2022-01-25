<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $base = $this->faker->randomFloat(2,1,10000);
        $impuesto = $this->faker->randomFloat(2,1,100);
        $total = $base * ( 1 + $impuesto);
        return [
            'nombre' => $this->faker->word(),
            'precio_base' => $base,
            'impuesto' => $impuesto,
            'precio_total' => $total
        ];
    }
}
