<?php

namespace Zofe\Rapyd\Commands;

use Illuminate\Console\Command;

class RapydCommand extends Command
{
    public $signature = 'rapyd-livewire';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
