<?php

namespace App\Helpers;

use App\Models\People;
use App\Models\Production;
use App\Models\Role;
use Illuminate\Database\Eloquent\TModel;


class CSV
{
    /**
     * @return array;
     * Returns an array of the header fields of a csv file.
     */
    public static function CSVtoArray($file): array
    {
        $handle = fopen($file, 'r');
        $rows = [];
        while ($row = fgetcsv($handle)) {
            $rows[] = $row;
        }
        fclose($handle);

        return $rows;

    }

    /**
     * @param string $first
     * @param string $last
     * @param string $netid
     * @return People|TModel
     */
    public static function ProcessPerson(string $first, string $last, string $netid, int $grad ): People
    {

        $person = People::firstOrCreate(['firstname'=>$first, 'lastname'=>$last, 'netid'=>$netid, 'grad'=>$grad]);
        return $person;

    }


    /**
     * @param string $rolename
     * @return Role
     */
    public static function ProcessRole(string $rolename) : Role
    {
        $role = Role::firstOrCreate(['name' => $rolename]);
        return $role;
    }


    /**
     * @param string $name
     * @return Production
     */
    public static function ProcessProduction(string $name) {

        $production = Production::firstOrCreate(['name' => $name]);
        return $production;


    }
}
