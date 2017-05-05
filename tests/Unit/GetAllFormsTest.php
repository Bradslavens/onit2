<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetAllFormsTest extends TestCase
{
   use DatabaseMigrations;

   public function testGetAllFormsJson()
   {
        $user = factory(\App\User::class)->create(['role' => 'admin']);
                
        factory(\App\Form::class, 10)->create(['user_id' => $user['id']]);

        $response = $this->actingAs($user)
            ->json('GET', route('get.forms'));

        $response->assertStatus(200)
            ->assertJson([
                    [
                        'id' => 1,
                    ],
                ]);


   }
}
