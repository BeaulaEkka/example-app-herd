<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory(200)->create()->each(function ($job) {
            $tags = Tag::factory(3)->create();
            $job->tags()->attach($tags->pluck('id')->toArray());
        });
    }
}
