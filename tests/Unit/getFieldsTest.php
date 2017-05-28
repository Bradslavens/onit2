<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class getFieldsTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetFields()
    {
        $user = factory(\App\User::class)->create(['teamLeader'=> 1]);

        // make some fields
        $fields = factory(\App\Field::class, 5)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->get(route('fieldList', ['field' => $fields[0]['name']]));

        $response->assertSee($fields[0]['name']);
    }
}
