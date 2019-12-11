<?php

use Illuminate\Database\Seeder;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'name'=>'Adolfo Suarez Barajas',
            'country'=>'España',
            'city'=>'Madrid'
        ]);
        DB::table('airports')->insert([
            'name'=>'Aeropuerto de Gran Canaria',
            'country'=>'España',
            'city'=>'Canarias'
        ]);
        DB::table('airports')->insert([
            'name'=>'Humberto Delgado',
            'country'=>'Portugal',
            'city'=>'Lisboa'
        ]);
        DB::table('airports')->insert([
            'name'=>'Francisco Sá Carneiro de Oporto',
            'country'=>'Portugal',
            'city'=>'Oporto'
        ]);
        

    }
}
