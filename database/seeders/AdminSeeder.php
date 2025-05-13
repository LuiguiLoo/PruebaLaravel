<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Luigi Loo Jara',
            'email' => 'Luigui_Loo.Jara@hotmail.com',
            'password' => Hash::make('$LuiguiLoo$'),
        ]);

    }
}
