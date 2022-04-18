<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
        	[
        		'name' => 'Admin',
        		'email' => 'admin@pendataan.id',
        		'is_admin' => '1',
        		'password' => bcrypt('admin123'),
        	],
        	[
        		'name' => 'User',
        		'email' => 'user@pendataan.id',
        		'is_admin' => '0',
        		'password' => bcrypt('user123'),
        	],
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@pendataan.id',
                'is_admin' => '2',
                'password' => bcrypt('superadmin123'),
            ]
        ];
        foreach ($user as $key => $value){
        	User::create($value);
        }
    }
}
