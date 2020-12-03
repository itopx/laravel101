<?php
namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "passwordinput" => $this->faker->name,
            "searchinput" => $this->faker->name,
            "prependedtext" => $this->faker->name,
            "textinput" => $this->faker->name
        ];
    }
}

