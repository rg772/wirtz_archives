<?php

namespace Tests\Unit;

use App\Models\Production;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductionTest extends TestCase
{

    use DatabaseMigrations;

    public function test_create_ten_prods()
    {
        $productions = Production::factory(10)->create();
        $this->assertCount(10, $productions);
    }


}
