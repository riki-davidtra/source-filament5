<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socials = [
            [
                'platform' => 'whatsapp',
                'url' => 'https://wa.me/6281234567890',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'instagram',
                'url' => 'https://instagram.com/example',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'facebook',
                'url' => 'https://facebook.com/example',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'youtube',
                'url' => 'https://youtube.com/@example',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'platform' => 'tiktok',
                'url' => 'https://tiktok.com/@example',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($socials as $social) {
            SocialMedia::query()->firstOrCreate(
                ['platform' => $social['platform']],
                $social
            );
        }
    }
}
