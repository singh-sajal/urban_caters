<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'contact_phone' => '+1 (555) 123-4400',
                'whatsapp_number' => '+15551234400',
                'contact_email' => 'hello@eventora.test',
                'contact_address' => 'Mumbai - Remote worldwide',
                'hero_main_heading' => 'Designing elevated events that feel effortless.',
                'hero_sub_heading' => 'We blend production, hospitality, and storytelling to craft weddings, corporate offsites, and experiential launches your guests remember.',
                'about_heading' => 'Eventora is a boutique team of producers, designers, and technologists.',
                'about_content' => 'We operate as your embedded event squad balancing budget discipline with imaginative staging, environmental design, and guest journeys.',
                'metric_one_label' => 'Events delivered',
                'metric_one_value' => '150+',
                'metric_two_label' => 'Happy guests',
                'metric_two_value' => '500+',
                'metric_three_label' => 'Years in craft',
                'metric_three_value' => '10',
                'metric_four_label' => 'Onsite support',
                'metric_four_value' => '24/7',
            ]
        );
    }
}
