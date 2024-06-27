<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(DokumenSeeder::class);
        User::create([
            'nik' => 'Admin',
            'nama_lengkap' => 'Admin',
            'tempat_lahir' => '-',
            'jenis_kelamin' => 'Laki-Laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Admin',
            'nomor_wa' => '-',
            'password' => 'Admin',
            'alamat' => '-',
        ]);
    }
}
