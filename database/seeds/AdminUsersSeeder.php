<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        try {

            $user = factory(App\User::class)->create([
                    "name" => "Cristian Fonollà Prats",
                    "email" => "cristian.fonolla@gmail.com",
                    "password" => bcrypt(env('CRISTIAN_PASS', '123456'))]
            );
            
            Role::create(['name' => 'admin']);
            $user->assignRole('admin');


        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}
