<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'titulo' => 'Hacer lista de la compra',
                'descripcion' => 'Compra de la semana',
                'states_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
