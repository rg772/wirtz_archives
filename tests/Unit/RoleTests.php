<?php

namespace Tests\Unit;

use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RoleTests extends TestCase
{
    use DatabaseMigrations;

    public function test_create()
    {
        $role = Role::factory()->create();
        $this->assertDatabaseHas('roles', ['id' => $role->id]);
    }

    public function test_update()
    {
        $role = Role::factory()->create();
        $role->name = 'Updated Name';
        $role->save();

        $this->assertDatabaseHas('roles', ['id' => $role->id, 'name' => 'Updated Name']);
    }

    public function test_read()
    {
        $role = Role::factory()->create();
        $retrievedRole = Role::find($role->id);

        $this->assertEquals($role->id, $retrievedRole->id);
    }

    public function test_soft_delete()
    {
        $role = Role::factory()->create();
        $role->delete();

        $this->assertSoftDeleted('roles', ['id' => $role->id]);
    }

    public function test_restore()
    {
        $role = Role::factory()->create();
        $role->delete();
        $role->restore();

        $this->assertDatabaseHas('roles', ['id' => $role->id]);
    }
}
