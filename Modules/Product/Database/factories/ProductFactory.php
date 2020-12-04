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
        $price = $this->faker->randomNumber(2);
        $name = $this->faker->name;

        return [
            'code' => $this->faker->numerify('PRO####'),
            'name' => $name,
            'slug' => $this->site_string_url($name),
            'detail' => $this->faker->realText(5000),
            'cover' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => $price,
            'sale_price' => ($price+10),
            'qty' => rand(1,100),
            'view' => rand(1,100),
            'status' => 1,
        ];
    }

    function site_string_url($string = '')
    {
        $string = preg_replace("`\[.*\]`U", "", $string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
        $string = preg_replace(["`[^a-z0-9ก-๙เ-า]`i", "`[-]+`"], "-", $string);
        return strtolower(trim($string, '-'));
    }
}

