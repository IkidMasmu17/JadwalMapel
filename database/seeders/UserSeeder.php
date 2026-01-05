<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Role, Guru, Siswa, Jabatan, Tingkat, Kelas, Rombel, SiswaRombel};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $guruRole = Role::firstOrCreate(['name' => 'guru']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);

        // 2. Master Data for Relations
        // Jabatan uses 'name'
        $jabatanGuru = Jabatan::firstOrCreate(['name' => 'Guru Pengajar']);

        // Tingkat uses 'nama'
        $tingkat = Tingkat::firstOrCreate(['nama' => '10']);

        // Kelas uses 'nama' and 'tingkat_id'
        $kelas = Kelas::firstOrCreate(
            ['nama' => 'Rekayasa Perangkat Lunak'],
            ['tingkat_id' => $tingkat->id]
        );

        // --- USERS ---

        // 1. Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin System',
                'password' => Hash::make('password'),
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        // 2. Guru
        $guruUser = User::firstOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Guru Pengajar',
                'password' => Hash::make('password'),
            ]
        );
        $guruUser->roles()->syncWithoutDetaching([$guruRole->id]);

        // Create Guru Profile
        $guruProfile = Guru::firstOrCreate(
            ['nip' => '1234567890'],
            [
                'user_id' => $guruUser->id,
                'nama' => $guruUser->name,
                'jabatan_id' => $jabatanGuru->id,
                'alamat' => 'Jl. Guru No. 1',
                'no_hp' => '081234567890',
                'agama' => 'Islam'
            ]
        );

        // 3. Rombel (Requires Guru ID and Kelas ID)
        $rombel = Rombel::firstOrCreate(
            ['kelas_id' => $kelas->id, 'guru_id' => $guruProfile->id],
            []
        );

        // 4. Siswa
        $siswaUser = User::firstOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Siswa Teladan',
                'password' => Hash::make('password'),
            ]
        );
        $siswaUser->roles()->syncWithoutDetaching([$siswaRole->id]);

        // Create Siswa Profile
        $siswaProfile = Siswa::firstOrCreate(
            ['nisn' => '0011223344'],
            [
                'user_id' => $siswaUser->id,
                'nama' => $siswaUser->name,
                'alamat' => 'Jl. Siswa No. 1',
                'no_hp' => '089876543210',
                'agama' => 'Islam'
            ]
        );

        // Link Siswa to Rombel
        SiswaRombel::firstOrCreate(
            ['siswa_id' => $siswaProfile->id],
            ['rombel_id' => $rombel->id]
        );

    }
}
