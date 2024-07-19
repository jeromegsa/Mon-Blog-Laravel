<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\User;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Article::class;
    public function definition(): array
    {
        return [
           'title'=>$this->faker->sentence(15),
           'body'=>$this->faker->paragraph(50),
           'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
           'image'=>$this->faker->image('public/images'),
        ];
    }
  
}
