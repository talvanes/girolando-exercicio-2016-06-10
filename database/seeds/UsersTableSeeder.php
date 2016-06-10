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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('4dm1nPA$$w0rd'),
            'remember_token' => '4dm1nPA$$w0rd',
            'created_at' => time(),
        ]);
    }
}
