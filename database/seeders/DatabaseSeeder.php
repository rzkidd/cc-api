<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perkuliahan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        MataKuliah::create([
            'kode' => '324143124',
            'nama' => 'Komputasi Cloud',
            'sks' => 3,
            'semester' => 6
        ]);
        MataKuliah::create([
            'kode' => '324214241',
            'nama' => 'Jaringan Komputer',
            'sks' => 4,
            'semester' => 4
        ]);
        MataKuliah::create([
            'kode' => '987857989',
            'nama' => 'Pemrograman Web',
            'sks' => 4,
            'semester' => 4
        ]);

        Mahasiswa::factory(5)->create();
        Dosen::factory(5)->create();
        Perkuliahan::factory(10)->create();
    }
}
