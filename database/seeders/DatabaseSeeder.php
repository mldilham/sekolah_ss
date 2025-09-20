<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin KitaSchool',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Operator KitaSchool',
            'username' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'operator',
        ]);
        Profile::create([
            'nama_sekolah'   => 'SMA Negeri 1 Contoh',
            'kepala_sekolah' => 'Drs. Budi Santoso',
            'foto'           => 'logo.png', // bisa diganti dengan file default
            'logo'           => 'foto_sekolah1.jpg', // bisa diganti dengan file default
            'npsn'           => '12345678',
            'alamat'         => 'Jl. Pendidikan No. 45, Jakarta',
            'kontak'         => '081234567890',
            'visi_misi'      => 'Visi: Menjadi sekolah unggul.
 Misi: Meningkatkan kualitas pembelajaran, membentuk karakter siswa, dan mengembangkan potensi.',
            'tahun_berdiri'  => 1990,
            'deskripsi'      => 'Sekolah ini berfokus pada pengembangan akademik dan non-akademik siswa agar siap menghadapi tantangan global.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
