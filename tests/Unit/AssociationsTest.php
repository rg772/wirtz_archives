<?php

namespace Tests\Unit;

use App\Models\Association;
use App\Models\People;
use App\Models\Production;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AssociationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create()
    {
        $people = People::factory()->create();
        $production = Production::factory()->create();
        $role = Role::factory()->create();

        $association = Association::factory()->create([
            'people_id' => $people->id,
            'production_id' => $production->id,
            'role_id' => $role->id,
            'status' => 'active', // Assuming 'active' is a valid status
        ]);

        $this->assertDatabaseHas('associations', ['id' => $association->id]);
    }

    public function test_update()
    {
        $association = Association::factory()->create();
        $association->status = 'inactive'; // Assuming 'inactive' is a valid status
        $association->save();

        $this->assertDatabaseHas('associations', ['id' => $association->id, 'status' => 'inactive']);
    }

    public function test_read()
    {
        $association = Association::factory()->create();
        $retrievedAssociation = Association::find($association->id);

        $this->assertEquals($association->id, $retrievedAssociation->id);
    }

    public function test_soft_delete()
    {
        $association = Association::factory()->create();
        $association->delete();

        $this->assertSoftDeleted('associations', ['id' => $association->id]);
    }

    public function test_restore()
    {
        $association = Association::factory()->create();
        $association->delete();
        $association->restore();

        $this->assertDatabaseHas('associations', ['id' => $association->id]);
    }
}
