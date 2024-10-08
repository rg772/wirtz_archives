<?php

namespace App\Helpers;

class CSV
{
    /**
     * @param $file
     * @return array
     * @description Returns an array of the header fields of a csv file.
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

}
