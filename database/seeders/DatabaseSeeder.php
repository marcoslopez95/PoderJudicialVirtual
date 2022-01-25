<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TiposUsuariosTableSeeder::class,
            UsersTableSeeder::class,
            UsuariosRandomSeeder::class,
            ProductoSeeder::class,
            CompraSeeder::class
        ]);
    }
}
