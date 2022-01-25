<?php
namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $cont = 20;
        $compras = Compra::all();
        

        $cont -= $compras->count();
        if($cont>0){
            for($i=0; $i<=$cont;$i++){
                $user = User::all();
                $user = $user->random();
                $cantidad_producto = rand(1,6);
                $compra = DB::table('compras')->insertGetId([
                    'user_id' => $user->id,
                    'fecha_compra' => $faker->dateTimeBetween(),
                    'base' => 0,
                    'impuestos' => 0,
                    'total' => 0,
                ]);
                $base = $impuestos = $total = 0;
                for($j = 0; $j<=$cantidad_producto; $j++){
                    $producto = Producto::all();
                    $producto = $producto->random();
                    $base += $producto->precio_base;
                    $impuestos += $producto->impuesto;
                    $total += $producto->precio_total;
                    DB::table('compra_producto')->insertGetId([
                        'compra_id' => $compra,
                        'producto_id' => $producto->id,
                        'impuesto' => $producto->impuesto,
                        'base'=> $producto->precio_base,
                        'total'=> $producto->precio_total,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                      ]);
                }
                DB::table('compras')->where('id',$compra)->update([
                    'base' => $base,
                    'impuestos' => $impuestos,
                    'total' => $total
                ]);
            }
            
            
        }
    }
}
