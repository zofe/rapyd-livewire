<?php

namespace Zofe\Rapyd\Commands;

use Illuminate\Console\Command;

class RapydCommand extends Command
{
    public $signature = 'rpd:hello';

    public $description = 'Simple hello command';

    public function handle()
    {
        $this->comment('Hello');
    }
}
