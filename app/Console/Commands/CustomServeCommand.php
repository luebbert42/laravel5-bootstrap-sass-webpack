<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ServeCommand;
use Symfony\Component\Console\Input\InputOption;

class CustomServeCommand extends ServeCommand
{


    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', '0.0.0.0'],//default 127.0.0.1
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 80],
        ];
    }

}
