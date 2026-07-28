<?php

use App\Models\AppSetting;
use App\Models\AppSeoSetting;

if (! function_exists('appSettings')) {
    function appSettings(): AppSetting
    {
        return AppSetting::firstOrCreate(['id' => 1]);
    }
}
