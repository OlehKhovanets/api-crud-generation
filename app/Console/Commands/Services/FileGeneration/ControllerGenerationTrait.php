<?php

namespace App\Console\Commands\Services\FileGeneration;

use App\Console\Commands\Services\Templates\ControllerTemplateTrait;
use Illuminate\Support\Facades\File;

trait ControllerGenerationTrait
{
    use ControllerTemplateTrait;

    public function createController($name, $path, $modelFilds)
    {
        //check if exist directory
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        if (!File::exists($path . '/' . ucfirst($name) . 'Controller' . '.php')) {
            File::put($path . '/' . ucfirst($name) . 'Controller' . '.php',
                $this->contentsController($name, $modelFilds));
        }
    }
}