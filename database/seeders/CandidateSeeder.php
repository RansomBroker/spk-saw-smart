<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidate = [
            [
              'name' => 'Pak herman'
            ],
            [
                'name' => 'Pak reza'
            ],
            [
                'name' => 'Bu Nia'
            ],
            [
                'name' => 'Bu Nani'
            ],
            [
                'name' => 'Pak De'
            ],
            [
                'name' => 'Pak Fadli'
            ],
            [
                'name' => 'Pak Faizal'
            ],
            [
                'name' => 'Bu lis'
            ],
            [
                'name' => 'Pak Asep'
            ],
            [
                'name' => 'Bu Yuli'
            ],
        ];

        $rating = [
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 1,
            ],
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 8,
            ],
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 12,
            ],
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 19,
            ],
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 24,
            ],
            [
                'candidate_id' => 1,
                'sub_criteria_id' => 27,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 5,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 8,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 15,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 19,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 24,
            ],
            [
                'candidate_id' => 2,
                'sub_criteria_id' => 28,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 2,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 6,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 13,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 18,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 23,
            ],
            [
                'candidate_id' => 3,
                'sub_criteria_id' => 29,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 1,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 8,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 13,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 17,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 24,
            ],
            [
                'candidate_id' => 4,
                'sub_criteria_id' => 30,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 3,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 7,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 14,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 19,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 24,
            ],
            [
                'candidate_id' => 5,
                'sub_criteria_id' => 27,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 4,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 10,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 11,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 18,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 21,
            ],
            [
                'candidate_id' => 6,
                'sub_criteria_id' => 26,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 2,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 9,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 13,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 17,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 21,
            ],
            [
                'candidate_id' => 7,
                'sub_criteria_id' => 28,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 4,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 8,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 12,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 16,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 22,
            ],
            [
                'candidate_id' => 8,
                'sub_criteria_id' => 29,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 3,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 9,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 12,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 18,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 21,
            ],
            [
                'candidate_id' => 9,
                'sub_criteria_id' => 27,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 3,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 6,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 13,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 20,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 25,
            ],
            [
                'candidate_id' => 10,
                'sub_criteria_id' => 27,
            ],
        ];

        Candidate::insert($candidate);
        Rating::insert($rating);
    }
}
