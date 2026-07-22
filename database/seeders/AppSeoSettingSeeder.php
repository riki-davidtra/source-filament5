<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\AppSeoSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppSeoSetting::query()->firstOrCreate(
            ['id' => 1],
            [
                'uuid' => Str::uuid(),
                'meta_title' => null,
                'meta_description' => null,
                'canonical_url' => null,
                'og_title' => null,
                'og_description' => null,
                'og_image' => null,
                'og_type' => 'website',
                'robots_index' => true,
                'robots_follow' => true,
                'sitemap_url' => null,
                'google_analytics_id' => null,
                'google_tag_manager_id' => null,
                'google_search_console_id' => null,
                'facebook_pixel_id' => null,
            ]
        );
    }
}
