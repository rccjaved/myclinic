<?php namespace MyClinic\Doctor;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot() {
        include_once(__DIR__ . '/helpers/EncryptionHelper.php');
    }
}
