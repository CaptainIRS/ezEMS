<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.siteName', 'ezEMS');
        $this->migrator->add('general.siteActive', true);
        $this->migrator->add('general.skin', 'https://cdn.jsdelivr.net/npm/ezems-skin-default@latest/dist/app.css');
    }
}
