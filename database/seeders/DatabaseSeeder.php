<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use App\Models\Option;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // run : php artisan db:seed
        // clean db and run : php artisan migrate:fresh --seed

        // User::factory(10)->create();
        // User::factory()->unverified()->create();
        User::factory()->create([
            'email' => 'john@doe.fr'
        ]);
        $options = Option::factory(10)->create();
        Property::factory(50)
            ->hasAttached($options->random(3))
            ->create();
    }
}
