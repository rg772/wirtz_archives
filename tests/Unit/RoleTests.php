<?php

namespace Tests\Unit;

use App\Models\Role;
use Tests\TestCase;

class RoleTests extends TestCase
{
    public function test_create()
    {
        $role=Role::factory()->create();
        $this->assertNotNull($role);
    }
}
