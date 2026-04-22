<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_phone',
        'whatsapp_number',
        'contact_email',
        'contact_address',
        'logo',
        'short_logo',
        'hero_image',
        'hero_main_heading',
        'hero_sub_heading',
        'about_heading',
        'about_content',
        'metric_one_label',
        'metric_one_value',
        'metric_two_label',
        'metric_two_value',
        'metric_three_label',
        'metric_three_value',
        'metric_four_label',
        'metric_four_value',
    ];
}
