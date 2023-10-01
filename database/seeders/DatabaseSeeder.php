<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //dd(\App::Environment());
        switch(\App::Environment()){
            case 'local':

            case 'testing':
                $seeds = [
                    EstudanteSeed::class
                ];
                break;

            case 'staging':
                $seeds = [
                    //\App\Models\User::class
                ];
                break;

            case 'production':
                $seeds = [];
                break;
        }

        if(count($seeds)){
            array_map(fn($s)=> $this->call($s), $seeds);
        }
    }


}
