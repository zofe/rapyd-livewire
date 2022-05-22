<?php

namespace Zofe\Rapyd\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {module : Name of the new module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Modules Using Command Line';

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $module = Str::studly($this->argument('module'));
        $moduleRaw = Str::snake($this->argument('module'));

        if($module) {

            $this->warn("--------------------------------");
            $this->warn("Creating a new module: " .$module);
            $this->warn("--------------------------------");

            $routePath = app_path('Modules/'. $module. '/routes.php');
            $configPath = app_path('Modules/'. $module. '/config.php');
            $indexPath = app_path('Modules/'. $module. '/Views/index.blade.php');
            $enTransPath = app_path('Modules/'. $module. '/Translations/en/general.php');

            $moduleViewPath = app_path('Modules/'. $module. '/Views');
            $moduleModelPath = app_path('Modules/'. $module. '/Models');
            $moduleCommandsPath = app_path('Modules/'. $module. '/Commands');
            $moduleMigrationPath = app_path('Modules/'. $module. '/Migrations');
            $moduleControllerPath = app_path('Modules/'. $module. '/Controllers');
            $moduleEnTranslationPath = app_path('Modules/'. $module. '/Translations/en');

            if( !File::exists($routePath) )
            {
                $this->warn("Creating Folder Structure ...");
                File::makeDirectory($moduleViewPath, 0755, true);
                $this->info("Created: " .$moduleViewPath);

                File::makeDirectory($moduleCommandsPath, 0755, true);
                $this->info("Created: " .$moduleCommandsPath);

                File::makeDirectory($moduleMigrationPath, 0755, true);
                $this->info("Created: " .$moduleMigrationPath);

                File::makeDirectory($moduleControllerPath, 0755, true);
                $this->info("Created: " .$moduleControllerPath);

                File::makeDirectory($moduleModelPath, 0755, true);
                $this->info("Created: " .$moduleModelPath);

                File::makeDirectory($moduleEnTranslationPath, 0755, true);
                $this->info("Created: " .$moduleEnTranslationPath);
            }

            $this->warn("Creating File Structure ...");

//            // generate home controller
//            $file_target = $moduleControllerPath. '/HomeController.php';
//            $file_tpl = __DIR__. '/Templates/HomeController.tpl';
//            $this->create($file_tpl, $file_target, [
//                'module' => $module,
//                'module_lower' => $moduleRaw
//            ]);

            // generate routes file
            $file_tpl = __DIR__. '/Templates/routes.tpl';
            $this->create($file_tpl, $routePath, [
                'module' => $module,
                'module_lower' => $moduleRaw
            ]);

            // generate config file
            $file_tpl = __DIR__. '/Templates/config.tpl';
            $this->create($file_tpl, $configPath, [
                'module' => $module,
                'module_lower' => $moduleRaw
            ]);

            // generate config file
            $file_tpl = __DIR__. '/Templates/index.tpl';
            $this->create($file_tpl, $indexPath, [
                'module' => $module,
                'module_lower' => $moduleRaw
            ]);

            // en trans
            $file_tpl = __DIR__. '/Templates/en_trans.tpl';
            $this->create($file_tpl, $enTransPath, [
                'module' => $module,
                'module_lower' => $moduleRaw
            ]);

        }
    }

    /**
     * @param $template_path
     * @param $target_path
     * @param array $variables
     * @throws \Exception
     */
    private function create($template_path, $target_path, $variables=[])
    {
        if(!file_exists($template_path)) {
            throw new \Exception("File {$template_path}.tpl does not exists.");
        }

        $template = file_get_contents($template_path);
        foreach($variables as $key => $value) {
            $template = str_replace('[['.$key.']]', $value, $template);
        }

        @file_put_contents($target_path, $template);
        $this->info("Created: " .$target_path);
    }
}
