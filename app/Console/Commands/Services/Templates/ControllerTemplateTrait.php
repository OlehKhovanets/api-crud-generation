<?php

namespace App\Console\Commands\Services\Templates;

trait ControllerTemplateTrait
{
    /**
     * @param $name
     * @param $modelFilds
     * @return string
     *
     * template for controller
     */
    public function contentsController($name, $modelFilds)
    {
        return
            '<?php
namespace App\Http\Controllers;

use App\Models\\'.ucfirst($name).';
use Illuminate\Http\Request;
         
class ' . ucfirst($name) . 'Controller  extends Controller
{
    public function index()
    {
        return response()->json([\'data\' => ' . ucfirst($name) . '::query()->get()]);
    }
    
    public function show('.ucfirst($name).' $'.$name.')
    {
        return response()->json([\'data\' => $' . $name . ']);
    }
    
    public function store(Request $request)
    {
        '.ucfirst($name).'::query()->create($request->all());
    }
    
    public function update('. ucfirst($name) .' $'. strtolower($name) .', Request $request)
    {
        '.$this->updateRequest($name, $modelFilds).'
        $'.$name.'->save();
    }
    
    public function destroy('. ucfirst($name) .' $'. strtolower($name) .')
    {
         $'. strtolower($name) .'->delete();
    }    
}';
    }

    private function updateRequest($name, $modelFilds)
    {
        $updateRequstString = '';
        $fields = explode(',', $modelFilds);
        foreach ($fields as $field) {
            $updateRequstString .= '$'. strtolower($name) .'->'. $field .' = $request[\''. $field .'\'];';

        }
        return $updateRequstString;
    }
}