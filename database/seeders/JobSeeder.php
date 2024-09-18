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
        $categories = ['Technology', 'Health', 'Business', 'Education', 'Travel', 'Science', 'Art', 'Sports', 'Care'];
        foreach ($categories as $category) {
            Tag::firstOrCreate(['name' => $category]);
        }

        Job::factory(200)->create()->each(function ($job) {
            // Get 3 unique random tag IDs from the existing tags
            $tags = Tag::inRandomOrder()->take(3)->pluck('id');
            $job->tags()->attach($tags);
        });
    }
}
