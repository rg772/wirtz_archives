<?php

namespace Tests\Unit;

use App\Helpers\CSV;
use PHPUnit\Framework\TestCase;

class CSVTest extends TestCase
{
    public function test_csvtoarray()
    {
      // Setup
        $file = __DIR__ . '/data/example.csv';
        $expected = [['header1', 'header2'], ['row1col1', 'row1col2'], ['row2col1', 'row2col2']];

        // Test
        $result = CSV::CSVtoArray($file);

        // Assertions
        $this->assertEquals($expected, $result);
    }
}
