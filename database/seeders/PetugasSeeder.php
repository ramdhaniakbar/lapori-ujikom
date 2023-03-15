<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugas = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'telepon' => '',
                'foto' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'petugas',
                'telepon' => '',
                'foto' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Jane Dunn',
                'email' => 'jane@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'petugas',
                'telepon' => '',
                'foto' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Petugas::insert($petugas);
    }
}
