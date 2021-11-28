<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Auteur;
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
                "name" => $this->faker->name(),
                "email" => $this->faker->safeEmail,
                "mobile" => $this->faker->phoneNumber,
                "age" => $this->faker->numberBetween(25, 45),
                "gender" => $this->faker->randomElement([
                    "male",
                    "female",
                    "others"
                ]),
                "address_info" => $this->faker->address,
                "auteur_id" => Auteur::factory(),
        ];
    }
}
