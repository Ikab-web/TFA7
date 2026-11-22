<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['full_name' => 'Maya Santos', 'email' => 'maya.santos@example.com', 'phone' => '09171234501'],
            ['full_name' => 'Liam Reyes', 'email' => 'liam.reyes@example.com', 'phone' => '09171234502'],
            ['full_name' => 'Sofia Cruz', 'email' => 'sofia.cruz@example.com', 'phone' => '09171234503'],
            ['full_name' => 'Noah Garcia', 'email' => 'noah.garcia@example.com', 'phone' => '09171234504'],
            ['full_name' => 'Isabella Flores', 'email' => 'isabella.flores@example.com', 'phone' => '09171234505'],
        ] as $customer) {
            Customer::updateOrCreate(['email' => $customer['email']], $customer);
        }

        foreach ([
            ['username' => 'amorgan', 'full_name' => 'Avery Morgan'],
            ['username' => 'jlee', 'full_name' => 'Jordan Lee'],
            ['username' => 'cpatel', 'full_name' => 'Casey Patel'],
            ['username' => 'rchen', 'full_name' => 'Riley Chen'],
            ['username' => 'tbrooks', 'full_name' => 'Taylor Brooks'],
        ] as $user) {
            User::updateOrCreate(['username' => $user['username']], $user);
        }
    }
}
