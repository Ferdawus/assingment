<?php

namespace Database\Factories;

use App\Models\Medicine;
use App\Models\MedicineCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'barcode' => $this->faker->ean13(),
            'medicineName' => $this->faker->name(),
            'strength' => $this->faker->name(),
            'medicineCategory' => $this->faker->randomElement(MedicineCategory::pluck('id')->toArray()),
            'medicineType' => $this->faker->randomElement(MedicineCategory::pluck('id')->toArray()),
            'generic' => $this->faker->name(),
            'medicineCompanay' => $this->faker->company(),
            'medicineIndication' => $this->faker->address(),
            'medicineGroup' => $this->faker->word(),
            'unit' => $this->faker->randomDigit(),
            'minLevel' => $this->faker->randomDigit(),
            'reOrderLevel' => $this->faker->randomDigit(),
            'tax' => $this->faker->randomDigit(),
            'packing' => $this->faker->randomDigit(),
            'packSize' => $this->faker->randomDigit(),
            'note' => $this->faker->text($maxNbChars = 200),
            
        ];
    }
}