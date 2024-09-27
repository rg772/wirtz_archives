<?php

namespace Tests\Unit;

use App\Models\Series;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SeriesTest extends TestCase
{

    use DatabaseMigrations;


    public function test_create()
    {
        $s = Series::factory()->create();
        $this->assertDatabaseHas('series', ['id' => $s->id]);
    }


    public function test_update()
    {
        $s = Series::factory()->create();
        $s->name = 'Updated Name';
        $s->save();

        $this->assertDatabaseHas('series', ['id' => $s->id, 'name' => 'Updated Name']);
    }


    public function test_read()
    {
        $s = Series::factory()->create();
        $retrievedSeries = Series::find($s->id);

        $this->assertEquals($s->id, $retrievedSeries->id);
    }


    public function test_soft_delete()
    {
        $s = Series::factory()->create();
        $s->delete();

        $this->assertSoftDeleted('series', ['id' => $s->id]);
    }


    public function test_restore()
    {
        $s = Series::factory()->create();
        $s->delete();
        $s->restore();

        $this->assertDatabaseHas('series', ['id' => $s->id]);
    }



}
