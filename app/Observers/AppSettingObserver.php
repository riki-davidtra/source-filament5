<?php

namespace App\Observers;

use App\Models\AppSetting;
use Illuminate\Support\Facades\Storage;

class AppSettingObserver
{
    public function updating(AppSetting $appSetting): void
    {
        if ($appSetting->isDirty('logo_url')) {
            $originalValue = $appSetting->getOriginal('logo_url');

            if ($originalValue && Storage::disk('public')->exists($originalValue)) {
                Storage::disk('public')->delete($originalValue);
            }
        }

        if ($appSetting->isDirty('favicon_url')) {
            $originalValue = $appSetting->getOriginal('favicon_url');

            if ($originalValue && Storage::disk('public')->exists($originalValue)) {
                Storage::disk('public')->delete($originalValue);
            }
        }
    }

    public function deleting(AppSetting $appSetting): void
    {
        if ($appSetting->logo_url) {
            if (Storage::disk('public')->exists($appSetting->logo_url)) {
                Storage::disk('public')->delete($appSetting->logo_url);
            }
        }

        if ($appSetting->favicon_url) {
            if (Storage::disk('public')->exists($appSetting->favicon_url)) {
                Storage::disk('public')->delete($appSetting->favicon_url);
            }
        }
    }
}
