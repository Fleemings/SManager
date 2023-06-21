<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    protected $model = Server::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'description' => $this->faker->sentence(),
            'ip' => $this->faker->unique()->ipv4()
        ];
    }
}
