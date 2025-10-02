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
            'nama_sekolah'   => 'SMAN 1 CIAWI ',
            'kepala_sekolah' => 'Drs. H. Aang Dohiri, M.Ag',
            'foto'           => 'upinipin.jpg', // bisa diganti dengan file default
            'logo'           => 'sekolah1.jpg', // bisa diganti dengan file default
            'npsn'           => '20210768',
            'alamat'         => 'Jl. Pasirhuni No.10, Pasirhuni, Kec. Ciawi, Kabupaten Tasikmalaya, Jawa Barat 46156',
            'kontak'         => '0265455222',
            'visi_misi'      => 'Terwujudnya peserta didik yang berakhlak mulia, bermutu, menghasilkan lulusan yang cerdas, kreatif, inovatif dan berbudaya yang mampu bersaing di era globalisasi.',
            'tahun_berdiri'  => 1980,
            'deskripsi'      => 'Dirintis oleh pemerintah dan tokoh pendidikan masyarakat Ciawi , awal berdiri tahun 1979 merupakan SMA Filial dari SMA Negeri 1 Kota Tasikmalaya Merupakan SMA Negeri tertua di Kabupaten Tasikmalaya, kurun waktu 1979  s.d. Sekarang telah dipimpin oleh 10 orang kepala sekolah, yang sekarang menjabat adalah Drs.H.Nandang, M.Pd. (Sebelumnya sukses menghantarkan/mengelola SMAN Manonjaya menjadi Sekolah RSBI). Telah meluluskan kurang lebih  33 angkatan  yang alumninya sukses berkarir diberbagai bidang profesi/pekerjaan',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
