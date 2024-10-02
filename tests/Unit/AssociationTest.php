<?php

namespace Tests\Unit;

use App\Helpers\CommonValues;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Association;
use App\Models\People;
use App\Models\Production;
use App\Models\Role;

class AssociationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_association()
    {
        $person = People::factory()->create();
        $production = Production::factory()->create();
        $role = Role::factory()->create();

        $association = Association::create([
            'people_id' => $person->id,
            'production_id' => $production->id,
            'role_id' => $role->id,
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('associations', [
            'id' => $association->id,
            'people_id' => $person->id,
            'production_id' => $production->id,
            'role_id' => $role->id,
            'status' => 'active',
        ]);
    }

    /** @test */
    public function it_can_read_an_association()
    {
        $association = Association::factory()->create();

        $found = Association::find($association->id);

        $this->assertEquals($association->id, $found->id);
    }

    /** @test */
    public function it_can_update_an_association()
    {
        $association = Association::factory()->create();

        $status = (CommonValues::getStatuses())[array_rand(CommonValues::getStatuses())];

        $association->update([
            'status' => $status,
        ]);

        $this->assertDatabaseHas('associations', [
            'id' => $association->id,
            'status' => $status,
        ]);
    }

    /** @test */
    public function it_can_delete_an_association()
    {
        $association = Association::factory()->create();

        $association->delete();

        $this->assertSoftDeleted('associations', [
            'id' => $association->id,
        ]);
    }
}
