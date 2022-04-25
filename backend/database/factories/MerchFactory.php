<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vendor;
use App\Models\Merch_types;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merch>
 */
class MerchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'type_id'=> Merch_types::all()->random()->id,
            'vendor_id'=> Vendor::all()->random()->id,
            'description'=> $this->faker->sentence,
            'photo'=> $this->faker->image(storage_path('images'), 800, 600),
            'stock'=> $this->faker->randomDigit,

        ];
    }
}
