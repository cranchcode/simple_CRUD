<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'uuid' => Str::uuid()->toString(),
                'username' => 'laz0rde',
                'firstName' => 'ahmed',
                'lastName' => 'elzelafy',
                'email' => 'a@a.com',
                'password' => Hash::make('@Aa123123'),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'username' => 'ahmed123',
                'firstName' => 'ahmed',
                'lastName' => 'mando',
                'email' => 'b@b.com',
                'password' => Hash::make('@Aa123123'),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'username' => 'ledo99',
                'firstName' => 'mo',
                'lastName' => 'salah',
                'email' => 'c@c.com',
                'password' => Hash::make('@Aa123123'),
            ]
        ]);
    }
}
