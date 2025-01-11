<?php

namespace Database\Seeders\ChallengeGroup;

use App\ChallengeGroup\Models\ChallengeGroup;
use Illuminate\Database\Seeder;

class ChallengeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChallengeGroup::factory()->count(10)->create();
    }
}
