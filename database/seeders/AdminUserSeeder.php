<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Super Admin",
            'email' => 'admin@mailinator.com',
            'mobile_no' => '11111111111',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => Carbon::now()
        ]);
    }
}
