<?php

namespace Zofe\Rapyd\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
//use Touhidurabir\StubGenerator\Facades\StubGenerator;
use Zofe\Rapyd\Utilities\StrReplacer;

class RapydMakeCommand extends Command
{
    public $signature = 'rpd:make {component : all|datatable|dataview|dataedit} {model} {--module=}';

    public $description = 'Simple hello command';

    private $module;

    public function handle()
    {
        $component = $this->getComponentName();
        $table = $this->getTableName();
        $this->module = $this->option('module');

        if (str_ends_with($component, 'Table')) {
            $this->datatable($component, $table);
        } elseif (str_ends_with($component, 'View')) {
            $this->dataview($component, $table);
        } else {
            $this->warn("first parameter can be a valid component name: datatable|dataview|dataedit");

            return;
        }
    }



    protected function getComponentName()
    {
        return $this->argument('component');
    }

    protected function getTableName()
    {
        $model = $this->argument('model');
        if (! $model) {
            $model = str_replace(['Table','View'], ['',''], $this->argument('component'));
        }
        $model = Str::singular($model);

        if (! class_exists($model) && ! class_exists(namespace_module("App\\Models\\" . $model))) {
            $this->warn("$model doesn't exists as model");
            exit;
        }

        return $model;
    }

    protected function datatable($component, $model)
    {
        $component = Str::studly($component);
        $this->comment('generate DataTable: '.$component.' for model '.$model);

        $namespace = "\\App\\Models\\$model";
        $table = (new $namespace)->getTable();


        $name = Str::of($component)->before('Table')->headline();
        $routename = $name->before('Table')
            ->replace(' ', '.')
            ->replace(Str::plural($model), '')
            ->replace($model, '')
            ->whenNotEmpty(function ($routename) {
                $routename->append('.');
            })
            ->append(Str::plural($model))->lower();
        $routeuri = $routename->replace('.', '/');

        $componentName = $name->afterLast(' ').'Table';
        $component_name = Str::snake($componentName);
        $classPath = path_module("/app/Components/".$name->replace(' ', '/'), $this->module);
        $classNamespace = namespace_module('App\\Components\\'.$name->replace(' ', '\\'), $this->module);

        $viewPrefix = $this->module? Str::lower($this->module).'::' : "components::";
        $viewPath = $viewPrefix.$name->replace(' ', '.').".$component_name";

        $modelNamespace = ! file_exists(base_path("app/Modules/{$this->module}/Models/{$model}.php")) ? 'App\\Models' : namespace_module('App\\Models', $this->module);

        //        //componente
        //        StubGenerator::from(__DIR__.'/Templates/Livewire/DataTable.stub', true)
        //            ->to($classPath, true)
        //            ->as($componentName)
        //            ->withReplacers([
        //                'class' => $componentName,
        //                'model' => $model,
        //                'table' => $table,
        //                'view' => $viewPath,
        //                'modelNamespace' => $modelNamespace,
        //                'traitNamespace' => 'Zofe\\Rapyd\\Traits',
        //                'baseClass' => 'Livewire\\Component',
        //                'baseClassName' => 'Component',
        //                'traitClass' => 'WithDataTable',
        //                'classNamespace' => $classNamespace,
        //            ])
        //            ->save();
        //        //view
        //        StubGenerator::from(__DIR__.'/Templates/resources/livewire/table.blade.stub', true)
        //            ->to($classPath, true)
        //            ->as($component_name.'.blade')
        //            ->withReplacers([
        //                'routename' => $routename,
        //                'modelname' => $table,
        //            ])
        //            ->save();
        //
        //        //rotta/e
        //        $strSubstitutor = (new StrReplacer([
        //            'class' => "\\".$classNamespace."\\".$componentName,
        //            'routepath' => $routeuri,
        //            'routename' => $routename,
        //        ]));
        //        $substituted = $strSubstitutor->replace(file_get_contents(__DIR__.'/Templates/routes/table.stub'));
        //
        //        if (! file_exists(base_path(path_module("/app/Components/routes.php", $this->module)))) {
        //            file_put_contents(
        //                base_path(path_module("/app/Components/routes.php", $this->module)),
        //                "<?php \n"."use Illuminate\Support\Facades\Route;\n"
        //            );
        //        }
        //        file_put_contents(base_path(path_module("/app/Components/routes.php", $this->module)), $substituted, FILE_APPEND);
        //
        //
        //        //module config
        //
        //        if ($this->module && ! file_exists(base_path("app/Modules/{$this->module}/config.php"))) {
        //            StubGenerator::from(__DIR__.'/Templates/config.stub', true)
        //                ->to(base_path("app/Modules/{$this->module}"), true)
        //                ->as('config')
        //                ->withReplacers([
        //                    'module' => Str::studly($this->module),
        //                ])
        //                ->save();
        //        }
    }


    protected function dataview($component, $model)
    {
        $component = Str::studly($component);
        $this->comment('generate DataView: '.$component.' for model '.$model);
    }
}
