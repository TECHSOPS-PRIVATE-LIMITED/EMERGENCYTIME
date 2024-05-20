<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = collect([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'super-admin',
                'phone' => '1234567890',
                'address' => '123 Main St',
                'dob' => '1990-01-01',
                'city' => 'New York',
                'photo' => null,
                'country_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'admin',
                'phone' => '1234567890',
                'address' => '123 Main St',
                'dob' => '1990-01-01',
                'city' => 'New York',
                'photo' => null,
                'country_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'user',
                'phone' => '1234567890',
                'address' => '123 Main St',
                'dob' => '1990-01-01',
                'city' => 'New York',
                'photo' => null,
                'country_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $users->map(function ($user) {
            $user = collect($user);
            $newUser = User::create($user->except('role')->toArray());
            $newUser->assignRole($user['role']);
        });
    }
}
