<?php
namespace Modules\Account\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Account\Entities\Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 100),
            'balance' => $this->faker->numberBetween($min = 0.00, $max = 1000000.00),
        ];
    }
}

