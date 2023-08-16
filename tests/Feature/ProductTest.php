<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        $data = [
            'name' => 'Sample Product',
            'description' => 'This is a sample product description.',
            'price' => 100.99,
            'categories' => Category::inRandomOrder()->limit(2)->pluck('id')
        ];

        $response = $this->post('/products', $data);

        $response->assertStatus(302); // redirecting after creation
        $this->assertCount(1, Product::all());
    }
}
