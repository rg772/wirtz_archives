<?php

namespace Tests\Unit;

use App\Models\People;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PeopleTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create()
    {
        $people = People::factory()->create();
        $this->assertDatabaseHas('people', ['id' => $people->id]);
    }

    public function test_update()
    {
        $people = People::factory()->create();
        $people->firstname = 'Updated Name';
        $people->save();

        $this->assertDatabaseHas('people', ['id' => $people->id, 'firstname'=>'Updated Name']);
    }

    public function test_read()
    {
        $people = People::factory()->create();
        $retrievedPeople = People::find($people->id);

        $this->assertEquals($people->id, $retrievedPeople->id);
    }

    public function test_soft_delete()
    {
        $people = People::factory()->create();
        $people->delete();

        $this->assertSoftDeleted('people', ['id' => $people->id]);
    }

    public function test_restore()
    {
        $people = People::factory()->create();
        $people->delete();
        $people->restore();

        $this->assertDatabaseHas('people', ['id' => $people->id]);
    }
}
