<?php

namespace Database\Seeders;

use App\Models\ReactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reaction_types = [
            'like',
            'love',
            'angry',
            'happy',
            'sad',
            'surprised',
            'dislike',
            'woow',
            'haha',
        ];

        foreach ($reaction_types as $type) {
            ReactionType::create([
                'type' => $type,
            ]);
        }
    }
}
