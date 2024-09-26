<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Helpers\StatusHelper;
use App\Models\People;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeopleTest extends TestCase
{
    use DatabaseMigrations;



    /**
     * Test that a People instance can be created using the factory.
     *
     * @return void
     */
    public function test_people_creation()
    {
        $person = People::factory()->create();
        $this->assertNotNull($person);
    }

    /**
     * Test that the default attributes are correctly set.
     *
     * @return void
     */
    public function test_default_attributes()
    {
        $person = People::factory()->create();
        $this->assertIsString($person->firstname);
        $this->assertIsString($person->lastname);
        $this->assertIsString($person->netid);
        $this->assertIsInt((int)$person->grad);
        $this->assertContains($person->status, StatusHelper::getStatuses());
    }

    /**
     * Test that custom attributes can be set correctly.
     *
     * @return void
     */
    public function test_custom_attributes()
    {
        $person = People::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'netid' => 'jdoe',
            'grad' => 2020,
            'status' => 'active',
        ]);

        $this->assertEquals('John', $person->firstname);
        $this->assertEquals('Doe', $person->lastname);
        $this->assertEquals('jdoe', $person->netid);
        $this->assertEquals(2020, $person->grad);
        $this->assertEquals('active', $person->status);
    }

    /**
     * Test that the People instance is correctly inserted into the database.
     *
     * @return void
     */
    public function test_database_insertion()
    {
        $person = People::factory()->create();
        $this->assertDatabaseHas('people', [
            'id' => $person->id,
            'firstname' => $person->firstname,
            'lastname' => $person->lastname,
            'netid' => $person->netid,
            'grad' => $person->grad,
            'status' => $person->status,
        ]);
    }




}
