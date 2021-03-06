<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adam',
            'email' => 'adam@appsynergy.net',
            'password' => bcrypt('admin'),
        ]);
    }
}
