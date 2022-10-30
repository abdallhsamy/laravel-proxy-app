<?php

namespace Database\Factories;

use App\Models\Broker;
use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'broker_id' => Broker::inRandomOrder()->value('id'),
            'name' => fake()->name('male'),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'national_id' => fake()->numerify('##########'),
            'date' => fake()->date(),
            'distance' => fake()->numberBetween(50, 4999),
            'amount' => fake()->numberBetween(699, 2500),
            'start_point' => fake()->numerify('##,######'),
            'start_address' => fake()->address(),
            'end_point' => fake()->numerify('##,######'),
            'end_address' => fake()->address(),
            'vat' => fake()->numberBetween(1,100),
//            'total_camels_value' => fake()->,
            'sub_total' => fake()->numerify('###'),
            'fees'=> fake()->numerify('##'),
            'total_amount' => fake()->numerify('###'),
            'iban' => fake()->iban(),
//            'camels' => $this->camels(),
        ];
    }

//    private function camels()
//    {
//        $camels = [];
//
//        $number = fake()->numberBetween(1, 5);
//
//        for ($i =1; $i<= $number; $i++ ) {
//            $camels[] = [
//                'ship_number' => fake()->numerify('###############'),
//                'value' => fake()->randomElement(Insurance::ALLOWED_CAMEL_VALUES)
//            ];
//        }
//
//        return $camels;
//    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
//    public function unverified()
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
}
