<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TiposUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuarios')->insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Admin de la web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Cliente',
                'descripcion' => 'Cliente',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
