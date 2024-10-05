<?php

namespace AntonioPrimera\AnafDataStructures\Commands;

use Illuminate\Console\Command;

class AnafDataStructuresCommand extends Command
{
    public $signature = 'anaf-data-structures';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
