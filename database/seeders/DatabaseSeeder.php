<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EventCategory;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(\Database\Seeders\SiteSettingSeeder::class);

        if (Event::count() === 0) {

            // Create Admin User
            User::firstOrCreate(
                ['email' => 'admin@eventora.test'],
                [
                    'name' => 'Admin',
                    'password' => Hash::make('password'),
                    'is_admin' => true,
                    'email_verified_at' => now(),
                ]
            );

            // Create Categories
            $categories = collect([
                'Weddings',
                'Corporate',
                'Birthdays',
                'Concerts'
            ])->map(function ($name) {
                return EventCategory::firstOrCreate([
                    'name' => $name
                ]);
            });

            // Create Events
            $categories->each(function ($category, $i) {

                Event::updateOrCreate(
                    ['title' => $category->name . ' Showcase'],
                    [
                        'event_category_id' => $category->id,
                        'event_date' => now()->addDays($i * 10),
                        'location' => 'Mumbai',
                        'summary' => 'Signature ' . strtolower($category->name) . ' experience crafted by Eventora.',
                        'body' => 'Full production, styling, and hospitality designed for impact.',
                        'is_featured' => $i < 2,
                    ]
                );

            });
        }
    }
}
