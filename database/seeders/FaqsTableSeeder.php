<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $categories = ['Allgemein', 'Services', 'Filme', 'Zahlung'];

        foreach($categories as $category)
        {
            $category = FaqCategory::create(['category' => $category]);
            foreach(range(1,5) as $id)
            {
                $question = new FaqQuestion;
                $question->question = $faker->sentence;
                $question->answer = $faker->paragraph;
                $category->faqQuestions()->save($question);
            }
        }
    }
}
