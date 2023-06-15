<?php

namespace Tests\Feature;

use Tests\TestCase;

class SourceControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testSuccessStoreResponse(): void
    {
        $postData = [
            'author' => fake()->userName(),
            'email'  => fake()->email(),
            'info'   => fake()->text(100),
            'phone'  => fake()->phoneNumber()
        ];

        $response = $this->post(route('source.store'), $postData);
        $response->assertJson($postData);
        $response->assertStatus(301);
    }

}
