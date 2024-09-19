<?php

namespace Database\Seeders;

use App\Models\Jop;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        Jop::factory(30)->hasAttached($tags)->create(new Sequence(
            [
                'featured' => false,
                'schedule' => 'Full Time'
            ],
            [
                'featured' => true,
                'schedule' => 'Part Time'
            ]
        ));
    }
}