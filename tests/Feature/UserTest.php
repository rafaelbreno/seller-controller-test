<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class UserTest
 * @package Tests\Feature
 */
class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = $this->get('/');

        /* Expects 302(redirect) */
        $response->assertStatus(302);
    }
    /**
     * A basic post method
     * User store method
     * @return void
     */
    public function testCreateUser()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ];
        $response = $this->post(route('seller.store'), $data);

        $response
            ->assertStatus(200)
            ->assertJson($data);
    }

}
