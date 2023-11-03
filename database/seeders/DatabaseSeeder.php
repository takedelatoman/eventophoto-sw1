<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Takeshi Kanashiro',
            'email' => 'take@gmail.com',
            'password' => Hash::make('secret'),
            'about' => "Hola soy un estudiante de 9no semestre.",
            'phone' => '123456789',
            'location' => 'Santa Cruz',
            'ci' => '123456789',
            'rol' => 'admin',
        ]);
    }
}
