<?php
namespace Database\Seeders;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosRandomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = 20;

        $usuarios = User::all();

        $cont -= $usuarios->count();

        if($cont>0){
            User::factory()
            ->count($cont)
            ->create();
        }
    }
}
