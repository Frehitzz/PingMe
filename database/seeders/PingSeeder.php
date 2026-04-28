<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User samples
        $users = User::count() < 3
        ? collect([
            User::create([
                'name' => 'Christine Banega',
                'email' => 'aia@gmail.com',
                'password' => bcrypt('password'),
            ]),
            User::create([
                'name' => 'Harlyne Rose',
                'email' => 'rose@gmail.com',
                'password' => bcrypt('password'),
            ]),
            User::create([
                'name' => 'Axyl faith',
                'email' => 'axyk@gmail.com',
                'password' => bcrypt('password'),
            ]),
        ]) : User::take(3)->get();

        // sample ping message
        $ping = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
        ];

        // ping message for random users
        foreach ($ping as $message) {
            $users->random()->pingme()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
