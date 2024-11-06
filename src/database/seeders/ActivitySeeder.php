<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    use WithoutModelEvents; //hace que no se ejecuten ciertas cosas,haciendo mas rapido el seeder
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->count(3)->create();
    }
}
