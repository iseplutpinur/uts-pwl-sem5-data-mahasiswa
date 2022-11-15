<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::beginTransaction();
        Fakultas::insert([
            ['id' => 1, 'nama' => 'Teknik', 'jml_mhs' => 0],
            ['id' => 2, 'nama' => 'Ekonomi', 'jml_mhs' => 0],
            ['id' => 3, 'nama' => 'FISIP', 'jml_mhs' => 0],
        ]);
        $prodi = [
            ['id' => 1, 'fakultas_id' => '1', 'nama' => 'Teknik Informatika', 'jml_mhs' => 0],
            ['id' => 2, 'fakultas_id' => '1', 'nama' => 'Sistem Informasi', 'jml_mhs' => 0],
            ['id' => 3, 'fakultas_id' => '2', 'nama' => 'Manajemen', 'jml_mhs' => 0],
            ['id' => 4, 'fakultas_id' => '3', 'nama' => 'Komunikasi', 'jml_mhs' => 0],
        ];
        Prodi::insert($prodi);

        $npm = 2113191001;
        $mhs = $this->mhs();
        for ($i = 0; $i < count($mhs); $i += count($prodi)) {
            for ($j = 0; $j < count($prodi); $j++) {
                $mhs_i = $mhs[$i + $j];

                $mahasiswa = new Mahasiswa();
                $mahasiswa->prodi_id = $prodi[$j]['id'];
                $mahasiswa->npm = $npm;
                $mahasiswa->nama = $mhs_i['nama'];
                $mahasiswa->jenis_kelamin = $mhs_i['jk'];
                $mahasiswa->thn_masuk = 2019;
                $mahasiswa->tanggal_lahir = $this->randomDate();
                $mahasiswa->alamat = 'Bandung';
                $mahasiswa->save();

                // set jml_mhs prodi
                $prod = Prodi::find($prodi[$j]['id']);
                $prod->jml_mhs += 1;
                $prod->save();

                // set jml_mhs fakultas
                $fak = $prod->fakultas;
                $fak->jml_mhs += 1;
                $fak->save();

                $npm++;
            }
        }

        DB::commit();
    }

    private function randomDate()
    {
        // Convert to timetamps
        $min = strtotime('2000-01-01');
        $max = strtotime('2002-01-01');

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }

    private function mhs(): array
    {
        $l = 'Laki-laki';
        $p = 'Perempuan';
        return [
            ['jk' => $p, 'nama' => 'Adistia Ramadhani'],
            ['jk' => $l, 'nama' => 'Ahmad Rizal Imaduddin'],
            ['jk' => $l, 'nama' => 'Akbar Maulana M. Tarumadoya'],
            ['jk' => $l, 'nama' => 'Alam Nurzaman'],
            ['jk' => $l, 'nama' => 'Cece Supriatna'],
            ['jk' => $p, 'nama' => 'Chika Stefanny Siswandi'],
            ['jk' => $l, 'nama' => 'Dara Atria Ferliandini'],
            ['jk' => $l, 'nama' => 'Deri Kurniawan'],
            ['jk' => $p, 'nama' => 'Dewi Febrima Raifu'],
            ['jk' => $l, 'nama' => 'Domingos Doutel Sarmento'],
            ['jk' => $l, 'nama' => 'Dominikus Ami Toron'],
            ['jk' => $l, 'nama' => 'Fachruly Al Huzairy'],
            ['jk' => $l, 'nama' => 'Fachruly Al Huzairy1'],
            ['jk' => $l, 'nama' => 'Fajar Nur Alamsyah'],
            ['jk' => $l, 'nama' => 'Farhan Aziz'],
            ['jk' => $l, 'nama' => 'Fernanda Dewa Ndaru Santoso'],
            ['jk' => $l, 'nama' => 'Irfan Ramdani'],
            ['jk' => $l, 'nama' => 'Irham Permana'],
            ['jk' => $l, 'nama' => 'Joshua Dehary Butar-butar'],
            ['jk' => $l, 'nama' => 'Joshua Dehary1 Butar-butar'],
            ['jk' => $l, 'nama' => 'M. Fahrel Ardiansyah'],
            ['jk' => $l, 'nama' => 'M. Fajar Ramadhani'],
            ['jk' => $l, 'nama' => 'M. Rafi Algippari'],
            ['jk' => $l, 'nama' => 'M. Sabit Kala'],
            ['jk' => $l, 'nama' => 'M. Taufik Ali Syech Ahmad'],
            ['jk' => $l, 'nama' => 'Iman Faturahman'],
            ['jk' => $l, 'nama' => 'Muhamad Ath-Thariq'],
            ['jk' => $l, 'nama' => 'Putri Hainuri Ar-Rahman'],
            ['jk' => $l, 'nama' => 'Raden Mochamad Lutphi Arbilly Ismail Poetra'],
            ['jk' => $l, 'nama' => 'Razan Aiman Nadir'],
            ['jk' => $l, 'nama' => 'Razfin Turfa Sandy'],
            ['jk' => $l, 'nama' => 'Razfin Turfa1 Sandy'],
            ['jk' => $l, 'nama' => 'Rivan Kurnia'],
            ['jk' => $p, 'nama' => 'Tini Patmawati'],
            ['jk' => $l, 'nama' => 'Yunita Fransiska Simatupang'],
            ['jk' => $l, 'nama' => 'Zidan Herdiansyah'],
        ];
    }
}
