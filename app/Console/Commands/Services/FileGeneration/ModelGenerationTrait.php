<?php

namespace App\Console\Commands\Services\FileGeneration;

use App\Console\Commands\Services\Templates\ControllerTemplateTrait;
use App\Console\Commands\Services\Templates\ModelTemplateTrait;
use Illuminate\Support\Facades\File;

trait ModelGenerationTrait
{
    use ModelTemplateTrait;

    public function createModel($name, $path, $modelFields)
    {
        $fieldString = '';
        $fields = explode(',', $modelFields);
        //fields from command line
        foreach ($fields as $field) {
            $fieldString .= "'" . $field ."',";

        }
        //check if exist directory
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        if (!File::exists($path . '/' . ucfirst($name) . '.php')) {
            File::put($path . '/' . ucfirst($name) . '.php',
                $this->contentsModel($name, $fieldString));
        }
    }
}