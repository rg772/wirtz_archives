<?php

namespace App\Console\Commands;

use App\Helpers\CSV;
use App\Models\Association;
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
        // get file path
        $this->line('Importing CSV file');
        $file = $this->argument('file');
        $this->line($file);

        // file exist
        if (! file_exists($file)) {
            $this->error("$file does not exist");
            die();
        }

        // Production name
        $production_name = pathinfo(basename($file), PATHINFO_FILENAME);
        $this->info($production_name);




        // loop over and process people
        foreach (CSV::CSVtoArray($file) as $row) {
            $first = trim($row[0]);
            $last = trim($row[1]);
            $role = trim($row[2]);
            $desc = trim($row[3]);
            $netid = trim($row[4]);
            $grad = (int) trim($row[5]);


            $production = CSV::ProcessProduction($production_name);
            $person = CSV::ProcessPerson($first, $last, $netid, $grad);
            $role = CSV::ProcessRole($role);

            dump([
                $desc
            ]);

            $association = Association::firstOrCreate([
                'people_id' => $person->id,
                'production_id' => $production->id,
                'role_id' => $role->id,
                'desc'=>$desc,
            ]);

            dump($association);




        };


    }
}
