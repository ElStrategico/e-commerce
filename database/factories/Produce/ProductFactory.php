<?php

namespace Database\Factories\Produce;

use App\Models\Produce\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'description'   => $this->faker->text,
            'price'         => $this->faker->numberBetween(100, 999999),
            'user_id'       => 1,
            'category_id'   => 1,
            'code'          => $this->faker->name
        ];
    }
}
