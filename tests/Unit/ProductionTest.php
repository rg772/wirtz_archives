<?php

namespace Tests\Unit;

use App\Models\Production;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductionTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create()
    {
        $production = Production::factory()->create();
        $this->assertDatabaseHas('productions', ['id' => $production->id]);
    }

    public function test_update()
    {
        $production = Production::factory()->create();
        $production->name = 'Updated Name';
        $production->save();

        $this->assertDatabaseHas('productions', ['id' => $production->id, 'name' => 'Updated Name']);
    }

    public function test_read()
    {
        $production = Production::factory()->create();
        $retrievedProduction = Production::find($production->id);

        $this->assertEquals($production->id, $retrievedProduction->id);
    }

    public function test_soft_delete()
    {
        $production = Production::factory()->create();
        $production->delete();

        $this->assertSoftDeleted('productions', ['id' => $production->id]);
    }

    public function test_restore()
    {
        $production = Production::factory()->create();
        $production->delete();
        $production->restore();

        $this->assertDatabaseHas('productions', ['id' => $production->id]);
    }
}
