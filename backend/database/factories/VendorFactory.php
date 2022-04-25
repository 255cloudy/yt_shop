<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Vendor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    protected $model = Vendor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=> $this->faker->name(),
            'user_id'=> User::factory()->create()->id,
            'photo'=> $this->faker->image(storage_path('images'), 800, 600),
        ];
    }
}
