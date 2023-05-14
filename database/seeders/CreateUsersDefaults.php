<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersDefaults extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Edem Fernando Bastos Castro';
        $user->login = '002021432';
        $user->email = 'edem.fbc@gmail.com';
        $user->password = bcrypt('Trojan-6060');
        $user->active = 1;
        $user->save();

        $user = new User();
        $user->name = 'Operador 1';
        $user->login = '999999';
        $user->email = 'operador1@gmail.com';
        $user->password = bcrypt('123456789');
        $user->active = 1;
        $user->save();
    }
}
