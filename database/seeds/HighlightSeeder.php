<?php

use App\Highlight;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class HighlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $newHighlight = new Highlight();
            $newHighlight->title = $faker->sentence(3, true);
            $newHighlight->text = $faker->randomHtml();
            $newHighlight->url = $faker->url();
            $newHighlight->author = $faker->name();
            $newHighlight->email = $faker->email();
            $newHighlight->save();
        }
    }
}
