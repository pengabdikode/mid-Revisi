<?php

use App\User;
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
        User::create([
            'email' => 'super@admin.com',
            'name' => 'super admin',
            'password' =>\Hash::make('supersuper'),
            'roles' => 's_admin',
        ]);

        User::create([
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' =>\Hash::make('adminadmin'),
            'roles' => 'admin',
        ]);

        User::create([
            'email' => 'aliong@gmail.com',
            'name' => 'aliong',
            'password' =>\Hash::make('aliongaliong'),
            'roles' => 'pembeli',
        ]);
    }
}
