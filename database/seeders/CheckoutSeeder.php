<?php

namespace Database\Seeders;

use App\Models\Checkout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkout = [
            'id' => 1,
            'user_id' => 2,
            'name' => 'Schnattergatter',
            'accessor' => Uuid::getFactory()->uuid4(),
            'password' => bcrypt('1234'),
            'plain' => '1234'
        ];

        Checkout::factory()->create($checkout);
    }
}
