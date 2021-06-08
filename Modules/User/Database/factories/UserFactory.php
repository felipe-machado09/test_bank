<?php
namespace Modules\User\Database\factories;

use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => Hash::make('123456'),
            'cpf' => $this->faker->cpf(false),
            'cnpj' => $this->faker->cnpj(false),
            'type_user' => $this->faker->randomElement($array = array ('Customer','Shopman')),
        ];
    }
}

