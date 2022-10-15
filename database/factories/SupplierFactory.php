<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplierName' => $this->faker->name(),
            'supplierContact' => $this->faker->phoneNumber(),
            'contactPersonName' => $this->faker->name(),
            'contactPersonPhone' => $this->faker->phoneNumber(),
            'drugLicenseNumber' => $this->faker->randomNumber(),
            'address' => $this->faker->address(),
            
        ];
    }
}