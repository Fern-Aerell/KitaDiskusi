<?php

namespace Database\Seeders\fakedata;

use App\Models\Votes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataVote = [
            [
                'comment_id' => 1,
                'user_id' => 1,
                'vote' => 'up',
            ],
            [
                'comment_id' => 2,
                'user_id' => 2,
                'vote' => 'up',
            ],
            [
                'comment_id' => 3,
                'user_id' => 3,
                'vote' => 'up',
            ],
            [
                'comment_id' => 4,
                'user_id' => 4,
                'vote' => 'down',
            ],
            [
                'comment_id' => 5,
                'user_id' => 5,
                'vote' => 'up',
            ],
            [
                'comment_id' => 6,
                'user_id' => 6,
                'vote' => 'up',
            ],
            [
                'comment_id' => 7,
                'user_id' => 7,
                'vote' => 'down',
            ],
            [
                'comment_id' => 8,
                'user_id' => 8,
                'vote' => 'up',
            ],
            [
                'comment_id' => 9,
                'user_id' => 9,
                'vote' => 'up',
            ],
            [
                'comment_id' => 10,
                'user_id' => 10,
                'vote' => 'up',
            ],
            [
                'comment_id' => 11,
                'user_id' => 1,
                'vote' => 'down',
            ],
            [
                'comment_id' => 12,
                'user_id' => 2,
                'vote' => 'up',
            ],
            [
                'comment_id' => 13,
                'user_id' => 3,
                'vote' => 'up',
            ],
            [
                'comment_id' => 14,
                'user_id' => 4,
                'vote' => 'up',
            ],
            [
                'comment_id' => 15,
                'user_id' => 5,
                'vote' => 'down',
            ],
            [
                'comment_id' => 16,
                'user_id' => 6,
                'vote' => 'up',
            ],
            [
                'comment_id' => 17,
                'user_id' => 7,
                'vote' => 'up',
            ],
            [
                'comment_id' => 18,
                'user_id' => 8,
                'vote' => 'down',
            ],
            [
                'comment_id' => 19,
                'user_id' => 9,
                'vote' => 'up',
            ],
            [
                'comment_id' => 20,
                'user_id' => 10,
                'vote' => 'up',
            ],
            [
                'comment_id' => 21,
                'user_id' => 1,
                'vote' => 'up',
            ],
            [
                'comment_id' => 22,
                'user_id' => 2,
                'vote' => 'down',
            ],
            [
                'comment_id' => 23,
                'user_id' => 3,
                'vote' => 'up',
            ],
            [
                'comment_id' => 24,
                'user_id' => 4,
                'vote' => 'up',
            ],
            [
                'comment_id' => 25,
                'user_id' => 5,
                'vote' => 'up',
            ],
            [
                'comment_id' => 26,
                'user_id' => 6,
                'vote' => 'down',
            ],
            [
                'comment_id' => 27,
                'user_id' => 7,
                'vote' => 'up',
            ],
            [
                'comment_id' => 28,
                'user_id' => 8,
                'vote' => 'up',
            ],
            [
                'comment_id' => 29,
                'user_id' => 9,
                'vote' => 'up',
            ],
            [
                'comment_id' => 30,
                'user_id' => 10,
                'vote' => 'down',
            ],
            [
                'comment_id' => 31,
                'user_id' => 1,
                'vote' => 'up',
            ],
            [
                'comment_id' => 32,
                'user_id' => 2,
                'vote' => 'up',
            ],
            [
                'comment_id' => 33,
                'user_id' => 3,
                'vote' => 'down',
            ],
            [
                'comment_id' => 34,
                'user_id' => 4,
                'vote' => 'up',
            ],
            [
                'comment_id' => 35,
                'user_id' => 5,
                'vote' => 'up',
            ],
            [
                'comment_id' => 36,
                'user_id' => 6,
                'vote' => 'up',
            ],
            [
                'comment_id' => 37,
                'user_id' => 7,
                'vote' => 'down',
            ],
            [
                'comment_id' => 38,
                'user_id' => 8,
                'vote' => 'up',
            ],
            [
                'comment_id' => 39,
                'user_id' => 9,
                'vote' => 'up',
            ],
            [
                'comment_id' => 40,
                'user_id' => 10,
                'vote' => 'up',
            ],
            [
                'comment_id' => 41,
                'user_id' => 1,
                'vote' => 'down',
            ],
            [
                'comment_id' => 42,
                'user_id' => 2,
                'vote' => 'up',
            ],
            [
                'comment_id' => 43,
                'user_id' => 3,
                'vote' => 'up',
            ],
            [
                'comment_id' => 44,
                'user_id' => 4,
                'vote' => 'up',
            ],
            [
                'comment_id' => 45,
                'user_id' => 5,
                'vote' => 'down',
            ],
            [
                'comment_id' => 46,
                'user_id' => 6,
                'vote' => 'up',
            ],
            [
                'comment_id' => 47,
                'user_id' => 7,
                'vote' => 'up',
            ],
            [
                'comment_id' => 48,
                'user_id' => 8,
                'vote' => 'down',
            ],
            [
                'comment_id' => 49,
                'user_id' => 9,
                'vote' => 'up',
            ],
            [
                'comment_id' => 50,
                'user_id' => 10,
                'vote' => 'up',
            ],
        ];

        foreach ($dataVote as $vote) {
            Votes::create($vote);
        }
    }
}
