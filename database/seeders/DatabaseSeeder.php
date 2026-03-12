<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Portfolio::create([
            'nama' => 'Rasya Aulia Rahman Firly',
            'profesi' => 'PPLG Student',
            'deskripsi' => 'Saya Rasya Aulia Rahman Firly siswa dari jurusan PPLG yang memiliki minat di bidang pemograman dasar dan penegembangan web.',
            'github' => 'https://github.com/zynek123', // GANTI DENGAN USERNAME GITHUB ANDA
            'foto_1' => null,
            'foto_2' => null,
        ]);
    }
}
