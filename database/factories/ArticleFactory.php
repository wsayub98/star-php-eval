<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $team = fake()->randomElement(['Arsenal', 'Liverpool', 'Barcelona', 'Real Madrid', 'Bayern Munich']);
        $opponent = fake()->randomElement(['Chelsea', 'Manchester City', 'Inter Milan', 'Paris Saint-Germain', 'Borussia Dortmund']);
        $minute = fake()->numberBetween(60, 90);
        $title = fake()->randomElement([
            "{$team} prepare for a crucial clash with {$opponent}",
            "Why {$team} need more control in the final twenty minutes",
            "How {$team} are rebuilding their midfield this season",
            "{$team} target reinforcements ahead of the transfer window",
        ]);

        $summary = fake()->randomElement([
            "For {$team}, the challenge is not winning the ball back but keeping it. Better spacing in midfield could make the difference against {$opponent}.",
            "A high press leaves little room for error. We look at how {$team} can protect their defence without losing their attacking width.",
            "Recruitment is about more than a headline signing. {$team} need players who can cover several roles through a demanding season.",
        ]);
        $body = implode("\n\n", [
            "{$team} have stepped up preparations for their meeting with {$opponent}. Training this week has focused on moving the ball quickly, pressing as a unit and creating chances from wide positions.",
            "After the {$minute}th minute, tired legs can leave space between midfield and defence. Introducing a fresh midfielder is one way to protect that space without abandoning the press.",
            'Supporters will be watching the midfield battle closely. The coaching staff want greater control in possession while keeping enough defensive cover to deal with quick counterattacks.',
            'With a demanding schedule ahead, squad rotation and recovery will be important. The next fixture offers another opportunity to build momentum and strengthen the team\'s position in the table.',
        ]);

        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'summary' => $summary,
            'body' => $body,
            'permalink' => fake()->unique()->slug(),
            'published_at' => fake()->boolean(90) ? fake()->dateTimeBetween('-6 months', 'now') : null,
            'thumbnail' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=960&q=80',
        ];
    }
}
