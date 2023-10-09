<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_list ()
    {
            $firstProduct = Product::factory()->create();
            $secondProduct = Product::factory()->create();
        
            // Act & Assert
            $this->get('/products')
                ->assertOk()
                ->assertSeeTextInOrder([
                    $firstProduct->title,
                    $secondProduct->title,
                ]);
        
    }
}
