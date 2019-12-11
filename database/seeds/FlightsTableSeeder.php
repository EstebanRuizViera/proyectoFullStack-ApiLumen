<?php

use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
            'flight_destination'=>'Canarias',
            'airport_id'=>'1'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Lisboa',
            'airport_id'=>'1'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Oporto',
            'airport_id'=>'1'
        ]);

        DB::table('flights')->insert([
            'flight_destination'=>'Madrid',
            'airport_id'=>'2'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Lisboa',
            'airport_id'=>'2'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Oporto',
            'airport_id'=>'2'
        ]);

        DB::table('flights')->insert([
            'flight_destination'=>'Madrid',
            'airport_id'=>'3'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Canarias',
            'airport_id'=>'3'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Oporto',
            'airport_id'=>'3'
        ]);

        DB::table('flights')->insert([
            'flight_destination'=>'Madrid',
            'airport_id'=>'4'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Canarias',
            'airport_id'=>'4'
        ]);
        DB::table('flights')->insert([
            'flight_destination'=>'Lisboa',
            'airport_id'=>'4'
        ]);
    }
}
