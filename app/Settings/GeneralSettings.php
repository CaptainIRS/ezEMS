<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $siteName;

    public bool $siteActive;

    public static function group(): string
    {
        return 'general';
    }
}
