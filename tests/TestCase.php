<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function getUserPemerintahDaerah(int $satkerId = 1030): User
    {
        return User::where('satuan_kerja_id', $satkerId)->where('role_id', Role::PEMERINTAH_DAERAH)->first();
    }

    protected function getUserPerangkatDaerah(int $satkerId = 1030): User
    {
        return User::where('satuan_kerja_id', $satkerId)->where('role_id', Role::PERANGKAT_DAERAH)->first();
    }

    protected function getUserSuper(): User
    {
        return User::where('role_id', Role::SUPER)->first();
    }

    protected function getUserSetda(): User
    {
        return User::where('role_id', Role::SETDA)->first();
    }
}
