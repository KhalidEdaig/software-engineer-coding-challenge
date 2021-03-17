<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'edaigkhalid',
            'email' => 'edaigkhalid@gmail.com',
            'password' => 'secret',
        ]);
    }
}
