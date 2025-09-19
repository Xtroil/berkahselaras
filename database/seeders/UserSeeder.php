<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['SUPER', 1],
            ['PEMERINTAH_DAERAH', 2],
            ['PERANGKAT_DAERAH', 3],
            ['SETDA', 4],
            ['GUBERNUR', 5],
            ['PEMDA', 6],
            ['VALIDATOR_BAPPEDA', 7],
            ['VALIDATOR_LKE', 8],
            ['VALIDATOR_LKE_PLENO', 9]
        ];


        foreach ($roles as $role) {
            Role::query()->updateOrCreate([
                'name' => $role[0],
            ], [
                'id' => $role[1],
                'name' => $role[0]
            ]);
        }
        $users = [
            ['Administratorbangkep', 'super', Role::SUPER],
            ['Sekretaris Daerah', 'sekretaris', Role::SETDA],
            ['Kabupaten Banggai Kepulauan', 'bupati', Role::GUBERNUR],
            ['Validator BAPPEDA', 'validator_bappeda', Role::VALIDATOR_BAPPEDA],
            ['Validator LKE', 'validator_lke', Role::VALIDATOR_LKE],
            ['Validator LKE PLENO', 'validator_lke_pleno', Role::VALIDATOR_LKE_PLENO],
        ];

        $pass = bcrypt('sultengmaju');

        foreach ($users as $user) {
            User::query()->updateOrCreate([
                'username' => $user[1],
            ], [
                'nama' => $user[0],
                'password' => $pass,
                'role_id' => $user[2],
            ]);
        }
    }
}
