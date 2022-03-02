<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a festival visitor
        User::factory()->create([
            'id' => 1,
            'name' => 'David Joos',
            'type' => 'user',
            'email_verified_at' => now(),
            'password' => bcrypt('test'),
            'email' => 'test@test.de',
        ]);

        // Create a festival
        User::factory()
            ->create([
            'id' => 2,
            'name' => 'Gans Anders',
            'type' => 'festival',
            'email_verified_at' => now(),
            'password' => bcrypt('test'),
            'email' => 'gansanders@test.de',
        ]);

        // Create products for a festival
        $beer = [
            'id' => 1,
            'user_id' => 2,
            'name' => 'Beer',
            'price' => 3.80,
            'variant' => '0,5L',
        ];

        $water = [
            'id' => 2,
            'user_id' => 2,
            'name' => 'Water',
            'price' => 1.60,
            'variant' => '1L',
        ];

        Product::factory()->create($beer);
        Product::factory()->create($water);

        $this->call([
            CheckoutSeeder::class
        ]);
    }
}
