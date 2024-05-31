<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Branch;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

         protected $model = Branch::class;

    public function definition(): array
    {
        return [
        'branchName'=> $this->faker->company(),
        'branchLoc' => $this->faker->address(),
        'no_of_employee' => $this->faker->randomNumber(),
        'no_of_token_available' => $this->faker->randomNumber()
        ];
    }
}
