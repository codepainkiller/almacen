<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Martin Cruz',
            'email' => 'i@martincruz.me',
            'password' => bcrypt('123456'),
        ]);

        factory(\App\User::class)->create([
            'name' => 'Jorge Cruz',
            'email' => 'milnercruz@gmail.com',
            'password' => bcrypt('19096854'),
        ]);
    }
}
