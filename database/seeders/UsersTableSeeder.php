<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@poderjudicialvirtual.com')->get();

        if($user->empty()){
            DB::table('users')->insert([
                'name' => 'Admin Admin',
                'email' => 'admin@poderjudicialvirtual.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'tipo_usuario' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
    }
}
