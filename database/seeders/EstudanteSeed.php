<?php

namespace Database\Seeders;

use App\Models\Estudante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudanteSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudante::factory(10)->create();
    }
}
