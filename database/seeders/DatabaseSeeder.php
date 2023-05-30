<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Server;
use App\Models\Team;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $workers = Worker::factory()->count(10)->create();

        $teams = Team::factory()->count(5)->create();

        $servers = Server::factory()->count(3)->create();

        foreach ($workers as $worker) {
            $worker->teams()->attach($teams->random(2)->pluck('id'));
            $worker->servers()->attach($servers->random(2)->pluck('id'));
        }

        foreach ($teams as $team) {
            $team->servers()->attach($servers->random(2)->pluck('id'));
        }
    }
}
