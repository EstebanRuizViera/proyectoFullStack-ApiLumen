<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('users')->insert([
            'name' => 'admin',
            'lastname' => 'admin',
            'dni' => '0000',
            'email' => 'admin@admin.com',
            'password' => base64_encode('1234'),
        ]);
    }
}
