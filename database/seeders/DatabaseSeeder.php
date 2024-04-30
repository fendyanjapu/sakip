<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JenisSopd;
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
        JenisSopd::create([
            'nama' => 'Sekretariat dan Inspektorat'
        ]);

        JenisSopd::create([
            'nama' => 'Badan'
        ]);

        JenisSopd::create([
            'nama' => 'Dinas'
        ]);

        JenisSopd::create([
            'nama' => 'Kecamatan'
        ]);
    }
}
