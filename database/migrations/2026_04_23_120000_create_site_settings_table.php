<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('logo')->nullable();
            $table->string('short_logo')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_main_heading')->nullable();
            $table->text('hero_sub_heading')->nullable();
            $table->string('about_heading')->nullable();
            $table->text('about_content')->nullable();
            $table->string('metric_one_label')->nullable();
            $table->string('metric_one_value')->nullable();
            $table->string('metric_two_label')->nullable();
            $table->string('metric_two_value')->nullable();
            $table->string('metric_three_label')->nullable();
            $table->string('metric_three_value')->nullable();
            $table->string('metric_four_label')->nullable();
            $table->string('metric_four_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
