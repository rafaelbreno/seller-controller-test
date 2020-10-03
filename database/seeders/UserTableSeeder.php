<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(
                Sale::factory()
                    ->count(3),
                'sales'
            )->count(30)
            ->create();
    }
}
