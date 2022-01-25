<?php
namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Faker\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = 20;
        $faker = \Faker\Factory::create();
        $productos = Producto::all();

        $cont -= $productos->count();

        if($cont>0){
            for($i = 0; $i <= $cont ; $i++){
                $base = $faker->randomFloat(2,1,1000);
                $impuesto = $faker->randomFloat(2,1,100);
                $total = $base * ( 1 + $impuesto);
                (new Producto())->create([
                    'nombre' => $faker->word(),
                    'precio_base' => $base,
                    'impuesto' => $impuesto,
                    'precio_total' => $total
                ]);
            } 
        }
            
        
    }
}
