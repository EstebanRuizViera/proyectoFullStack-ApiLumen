<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            $user = new User;
            $user->name = 'admin';
            $user->lastname = 'admin';
            $user->dni = '0000';
            $user->email = 'admin@admin.com';
            $user->password = app('hash')->make('1234');
            $user->role = 'ADMIN';
            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }
}
