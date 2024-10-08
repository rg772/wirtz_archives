<?php

namespace App\Console\Commands;

use App\Helpers\CSV;
use Illuminate\Console\Command;

class ImportCSVCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Importing CSV file');
        $file = $this->argument('file');
        $this->line($file);


        dd(CSV::CSVtoArray($file));


    }
}
