<?php

use Illuminate\Database\Seeder;

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
            factory(App\User::class)->create([
                    "name" => "Cristian Fonollà Prats",
                    "email" => "cristian.fonolla@gmail.com",
                    "password" => bcrypt(env('CRISTIAN_PASS', '123456'))]
            );
        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}
