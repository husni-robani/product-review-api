<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(10),
            'price' => $this->faker->numerify('#####')
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
           Review::factory()->count(2)->create([
               'productId' => $product->id
           ]) ;
        });
    }
}
