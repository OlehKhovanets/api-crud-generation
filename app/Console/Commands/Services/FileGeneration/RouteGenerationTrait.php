<?php

namespace App\Console\Commands\Services\FileGeneration;

use App\Console\Commands\Services\Templates\ControllerTemplateTrait;
use App\Console\Commands\Services\Templates\ModelTemplateTrait;
use Illuminate\Support\Facades\File;

trait RouteGenerationTrait
{

    public function createRoute($name, $path)
    {
            File::append($path . '/api.php',
            'Route::resource(\''.strtolower($name).'\', \''.ucfirst($name).'Controller\');');
    }
}