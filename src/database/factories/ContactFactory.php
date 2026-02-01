<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'last_name' =>$this->faker->lastName(),
        'first_name' =>$this->faker->firstName(),
        'gender' =>$this->faker->randomElement([1,2,3]),
        'email' =>$this->faker->unique()->safeEmail(),
        'tell'=>$this->faker->phoneNumber(),
        'address' =>$this->faker->address,
        'building' =>$this->faker->secondaryAddress,
        'category_id' =>$this->faker->randomElement(['1','2','3','4','5']),
        'detail' =>$this->faker->paragraph(5),
        ];
    }
}
