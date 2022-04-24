<?php

namespace Zofe\Rapyd\Commands;

use Illuminate\Console\Command;

class DataTableCommand extends Command
{
    public $signature = 'rpd:datatable {class} {--table=}';
    public $description = 'generate datatable component + view';

    public function handle()
    {
        $this->comment('class='.$this->argument('class').' table='.$this->option('table'));
    }
}
