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
        'first_name' =>$this->faker->firstName(),
        'last_name' =>$this->faker->lastName(),
        'gender' =>$this->faker->randomElement([1,2,3]),
        'email' =>$this->faker->unique()->safeEmail(),
        'tell'=>$this->faker->phoneNumber(),
        'address' =>$this->faker->address,
        'building' =>$this->faker->secondaryAddress,
        'kinds' =>$this->faker->randomElement(['商品のお届けについて','商品の交換について','商品トラブル','ショップへのお問い合わせ','その他']),
        'detail' =>$this->faker->paragraph(5),
        ];
    }
}
