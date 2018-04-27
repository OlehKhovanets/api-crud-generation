<?php

namespace App\Console\Commands;

use App\Console\Commands\Services\FileGeneration\ControllerGenerationTrait;
use App\Console\Commands\Services\FileGeneration\MigrationGenerationTrait;
use App\Console\Commands\Services\FileGeneration\ModelGenerationTrait;
use App\Console\Commands\Services\FileGeneration\RouteGenerationTrait;
use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    use ControllerGenerationTrait, ModelGenerationTrait, MigrationGenerationTrait, RouteGenerationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api-crud {name} {fields}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $path = 'app/Http/Controllers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     *
     * 1)cp .env.example .env
     * 2)php artisan key:generate
     * 3)connect to db
     * 4)command:
     * php artisan make:crud
     * -first parameter name , example: Post, User, etc...
     * -second parameter fields, example:title,descrition, etc...
     * full examle: php artisan make:api-crud Post title,description
     *
     * issues:for now only allow string types in migrations
     *
     */
    public function handle()
    {
        //fields from command
        $modelFilds = $this->argument('fields');
        //name from command
        $name = $this->argument('name');

            $this->createMigration($name, 'database/migrations', $modelFilds);
            $this->createModel($name, 'app/Models', $modelFilds);
            $this->createController($name, 'app/Http/Controllers', $modelFilds);
            $this->createRoute($name, 'routes');

            $this->info('api crud generated successfully');
    }
}
