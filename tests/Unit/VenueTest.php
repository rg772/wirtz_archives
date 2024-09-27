<?php

namespace Tests\Unit;

use App\Models\Venue;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VenueTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create()
    {
        $venue = Venue::factory()->create();
        $this->assertDatabaseHas('venues', ['id' => $venue->id]);
    }

    public function test_update()
    {
        $venue = Venue::factory()->create();
        $venue->name = 'Updated Name';
        $venue->save();

        $this->assertDatabaseHas('venues', ['id' => $venue->id, 'name' => 'Updated Name']);
    }

    public function test_read()
    {
        $venue = Venue::factory()->create();
        $retrievedVenue = Venue::find($venue->id);

        $this->assertEquals($venue->id, $retrievedVenue->id);
    }

    public function test_soft_delete()
    {
        $venue = Venue::factory()->create();
        $venue->delete();

        $this->assertSoftDeleted('venues', ['id' => $venue->id]);
    }

    public function test_restore()
    {
        $venue = Venue::factory()->create();
        $venue->delete();
        $venue->restore();

        $this->assertDatabaseHas('venues', ['id' => $venue->id]);
    }
}

