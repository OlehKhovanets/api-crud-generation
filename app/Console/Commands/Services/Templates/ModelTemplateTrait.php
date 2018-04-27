<?php

namespace App\Console\Commands\Services\Templates;

trait ModelTemplateTrait
{
    /**
     * @param $name
     * @param $fields
     * @return string
     *
     * template for model
     */
    public function contentsModel($name, $fields)
    {
        return
            '<?php
namespace App\Models;
         
use Illuminate\Database\Eloquent\Model;

class ' . ucfirst($name) . ' extends Model
{
    protected $table = \''. strtolower($name) .'s\';
    
    protected $fillable = [
        ' . $fields . '
    ];
    
}';
    }
}