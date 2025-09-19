<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSKPDSeeder extends Seeder
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
            ['Operator BAPPEDA&LITBANG', 'opbappeda&litbang', Role::PERANGKAT_DAERAH, '1'],
            ['Operator KESBANGPOL', 'opkesbangpol', Role::PERANGKAT_DAERAH, '2'],
            ['Operator DINKES', 'opdinkes', Role::PERANGKAT_DAERAH, '3'],
            ['Operator DP3AP2KB', 'opdp3ap2kb', Role::PERANGKAT_DAERAH, '4'],
            ['Operator SATPOLPP', 'opsatpolpp', Role::PERANGKAT_DAERAH, '5'],
            ['Operator DPMD', 'opdpmd', Role::PERANGKAT_DAERAH, '6'],
            ['Operator DIKBUD', 'opdikbud', Role::PERANGKAT_DAERAH, '7'],
            ['Operator BKPSDM', 'opbkpsdm', Role::PERANGKAT_DAERAH, '8'],
            ['Operator DISPERPUS&SIP', 'opdisperpus&sip', Role::PERANGKAT_DAERAH, '9'],
            ['Operator DISPENCAPIL', 'opdispencapil', Role::PERANGKAT_DAERAH, '10'],
            ['Operator DISPORA', 'opdispora', Role::PERANGKAT_DAERAH, '11'],
            ['Operator DPRDBANGKEP', 'opdprdbangkep', Role::PERANGKAT_DAERAH, '12'],
            ['Operator DISPAR', 'opdispar', Role::PERANGKAT_DAERAH, '13'],
            ['Operator DINSOS', 'opdinsos', Role::PERANGKAT_DAERAH, '14'],
            ['Operator RSUDTRIKORA', 'oprsudtrikora', Role::PERANGKAT_DAERAH, '15'],
            ['Operator RSPRATAMA', 'oprspratama', Role::PERANGKAT_DAERAH, '16'],
            ['Operator PUSKESMASSALAKAN', 'oppuskesmassalakan', Role::PERANGKAT_DAERAH, '17'],
            ['Operator PUSKESMASTOTSEL', 'oppuskesmastosel', Role::PERANGKAT_DAERAH, '18'],
            ['Operator PUSKESMASLOLANTANG', 'oppuskesmaslolantang', Role::PERANGKAT_DAERAH, '19'],
            ['Operator PUSKESMASSABANG', 'oppuskesmassabang', Role::PERANGKAT_DAERAH, '20'],
            ['Operator PUSKESMASBONEPUSO', 'oppuskesmasbonepuso', Role::PERANGKAT_DAERAH, '21'],
            ['Operator PUSKESMASBAKARA', 'oppuskesmasbakara', Role::PERANGKAT_DAERAH, '22'],
            ['Operator PUSKESMASTOTIKUM', 'oppuskesmastotikum', Role::PERANGKAT_DAERAH, '23'],
            ['Operator PUSKESMASMANSAMAT', 'oppuskesmasmansamat', Role::PERANGKAT_DAERAH, '24'],
            ['Operator PUSKESMASTINUT', 'oppuskesmastinut', Role::PERANGKAT_DAERAH, '25'],
            ['Operator PUSKESMASSALEATI', 'oppuskesmassaleati', Role::PERANGKAT_DAERAH, '26'],
            ['Operator PUSKESMASPATUKUKI', 'oppuskesmaspatukuki', Role::PERANGKAT_DAERAH, '27'],
            ['Operator PUSKESMASBULAGI', 'oppuskesmasbulagi', Role::PERANGKAT_DAERAH, '28'],
            ['Operator PUSKESMASTATABA', 'oppuskesmastataba', Role::PERANGKAT_DAERAH, '29'],
            ['Operator PUSKESMASLUMBILUMBIA', 'oppuskesmaslumbilumbia', Role::PERANGKAT_DAERAH, '30'],
            ['Operator SEKRETARIATDAERAH', 'sekretariatdaerah', Role::PERANGKAT_DAERAH, '31'],
            ['Operator HUMAS', 'ophumas', Role::PERANGKAT_DAERAH, '32'],
            ['Operator UMUM', 'opumum', Role::PERANGKAT_DAERAH, '33'],
            ['Operator HUKUM', 'ophukum', Role::PERANGKAT_DAERAH, '34'],
            ['Operator KESRA', 'opkesra', Role::PERANGKAT_DAERAH, '35'],
            ['Operator PBJ', 'oppbj', Role::PERANGKAT_DAERAH, '36'],
            ['Operator TAPEM', 'optapem', Role::PERANGKAT_DAERAH, '37'],
            ['Operator ORTAL', 'oportal', Role::PERANGKAT_DAERAH, '38'],

        ];

        $pass = bcrypt('skpd@sulteng');

        foreach ($users as $user) {
            User::query()->updateOrCreate([
                'username' => $user[1],
            ], [
                'nama' => $user[0],
                'password' => $pass,
                'role_id' => $user[2],
                'satuan_kerja_id' => $user[3],
            ]);
        }
    }
}
