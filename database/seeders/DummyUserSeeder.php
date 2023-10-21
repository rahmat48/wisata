<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Admin1',
                'email'=>'admin@gmail.com',
                'level'=>'admin',
                'password'=>bcrypt('admin')
            ],
            [
                'name'=>'User1',
                'email'=>'user@gmail.com',
                'level'=>'user',
                'password'=>bcrypt('user')
            ],
            ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
