<?php

namespace Tests\Feature;

use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * 
     */
    public function test_index() {
        $response = $this->json('GET', route('products.index'));
        $response->assertStatus(200);
    }

    public function test_store_product() {
        $user = User::factory()->create();
        $data = [
            'description' => 'test description'
        ];
        $response = $this->actingAs($user)->json('POST', route('product.store'), $data);
        $response->assertStatus(200);
    }


}

