<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from_id' => 2,
            'to_id' => 1,
            'amount' => $this->faker->randomFloat(2, 1.20, 14.50),
            'description' => $this->faker->text(20)
        ];
    }
}
