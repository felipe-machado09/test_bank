<?php
namespace Modules\Transaction\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Transaction\Entities\Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payer_id' => $this->faker->numberBetween(1, 50),
            'payee_id' => $this->faker->numberBetween(51, 100),
            'value' => $this->faker->numberBetween($min = 0.00, $max = 1000000.00),
            'type_transaction' => 'Transfer',
        ];
    }
}

