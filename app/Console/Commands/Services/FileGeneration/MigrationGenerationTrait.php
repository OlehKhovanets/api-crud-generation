<?php

namespace App\Console\Commands\Services\FileGeneration;

use App\Console\Commands\Services\Templates\MigrationTemplateTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

trait MigrationGenerationTrait
{
    use MigrationTemplateTrait;

    public function createMigration($name, $path, $modelFilds)
    {
        //check if exist directory
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        //if file not exist create file
        if (!File::exists($path . '/' . Carbon::now()->year.'_'. Carbon::now()->month.'_'. Carbon::now()->day.'_'.'000000'.'_create_'.$name . 's_table' . '.php')) {

            File::put($path . '/' . Carbon::now()->year.'_'. Carbon::now()->month.'_'. Carbon::now()->day.'_'.'000000'.'_create_'.$name . 's_table' . '.php',
            $this->contentsMigration($name, $modelFilds)
            );
        }
    }
}