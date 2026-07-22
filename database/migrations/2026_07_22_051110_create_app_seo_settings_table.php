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
        Schema::create('app_seo_settings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // SEO dasar (hasil pencarian Google)
            $table->string('meta_title', 160)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('canonical_url', 255)->nullable();

            // Open Graph (preview share ke FB/WA/LinkedIn)
            $table->string('og_title', 160)->nullable();
            $table->string('og_description', 255)->nullable();
            $table->string('og_image', 255)->nullable(); // idealnya 1200x630px
            $table->string('og_type', 50)->default('website');

            // Search engine control
            $table->boolean('robots_index')->default(true);
            $table->boolean('robots_follow')->default(true);
            $table->string('sitemap_url', 255)->nullable();

            // Tracking & analytics
            $table->string('google_analytics_id', 50)->nullable();     // G-XXXXXXX
            $table->string('google_tag_manager_id', 50)->nullable();   // GTM-XXXXXXX
            $table->string('google_search_console_id', 100)->nullable();
            $table->string('facebook_pixel_id', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_seo_settings');
    }
};
