<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::firstOrCreate([], [
            'hero_main_heading' => 'Designing elevated events that feel effortless.',
            'hero_sub_heading' => 'We blend production, hospitality, and storytelling to craft unforgettable events.',
            'about_heading' => 'Eventora is a boutique team of producers, designers, and technologists.',
            'about_content' => 'We operate as your embedded event squad balancing budget discipline with imaginative staging.',
            'metric_one_label' => 'Events delivered',
            'metric_one_value' => '150+',
            'metric_two_label' => 'Happy guests',
            'metric_two_value' => '500+',
            'metric_three_label' => 'Years in craft',
            'metric_three_value' => '10',
            'metric_four_label' => 'Onsite support',
            'metric_four_value' => '24/7',
        ]);

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::firstOrCreate([]);

        $data = $request->validate([
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string|max:255',
            'hero_main_heading' => 'nullable|string|max:255',
            'hero_sub_heading' => 'nullable|string|max:1000',
            'about_heading' => 'nullable|string|max:255',
            'about_content' => 'nullable|string|max:5000',
            'metric_one_label' => 'nullable|string|max:100',
            'metric_one_value' => 'nullable|string|max:100',
            'metric_two_label' => 'nullable|string|max:100',
            'metric_two_value' => 'nullable|string|max:100',
            'metric_three_label' => 'nullable|string|max:100',
            'metric_three_value' => 'nullable|string|max:100',
            'metric_four_label' => 'nullable|string|max:100',
            'metric_four_value' => 'nullable|string|max:100',
            'logo' => 'nullable|image|max:4096',
            'short_logo' => 'nullable|image|max:4096',
            'hero_image' => 'nullable|image|max:6144',
        ]);

        foreach (['logo', 'short_logo', 'hero_image'] as $field) {
            if ($request->hasFile($field)) {
                if (!empty($settings->{$field})) {
                    Storage::disk('public')->delete($settings->{$field});
                }

                $data[$field] = $request->file($field)->store('settings', 'public');
            }
        }

        $settings->update($data);

        return redirect()->route('admin.settings.edit')->with('status', 'Site settings updated.');
    }
}
