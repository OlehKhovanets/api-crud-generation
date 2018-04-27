<?php

namespace App\Console\Commands\Services\Templates;

trait MigrationTemplateTrait
{
    /**
     * @param $name
     * @param $fields
     * @return string
     *
     * template for migration
     */
    public function contentsMigration($name, $fields)
    {
        return
            '<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create'.ucfirst($name).'sTable extends Migration
{

    public function up()
    {
        Schema::create(\''.strtolower($name).'s\', function (Blueprint $table) {
            $table->increments(\'id\');
            '. $this->fields($fields) .'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(\''.$name.'s\');
    }
}';
    }

    private function fields($fields)
    {
        $fields = explode(',', $fields);
        $fieldsString = '';
        foreach ($fields as $field) {
        $fieldsString .=   '$table->string(\''.$field.'\');';
        }
        return $fieldsString;
    }
}