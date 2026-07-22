<?php

use App\Models\AppSetting;
use App\Models\AppSeoSetting;

if (! function_exists('appSettings')) {
    function appSettings(): AppSetting
    {
        return AppSetting::firstOrCreate(['id' => 1]);
    }
}

if (! function_exists('appSeoSettings')) {
    function appSeoSettings(): AppSeoSetting
    {
        return AppSeoSetting::firstOrCreate(['id' => 1]);
    }
}
