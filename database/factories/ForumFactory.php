<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerFr = FakerFactory::create('fr_FR');
        $fakerEn = FakerFactory::create('en_GB');
        $language = $this->faker->randomElement(['fr', 'en']);

        return [
            'title' => [
                'fr' => $fakerFr->realTextBetween(100),
                'en' => $fakerEn->realText(100),
            ],
            'content' => [
                'fr' => $fakerFr->realText(1000),
                'en' => $fakerEn->realText(1000),
            ],
            'language' => $language,
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'user_id' => User::factory(),
        ];
    }
}
