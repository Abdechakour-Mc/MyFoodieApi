<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*  $table->id();
            $table->string('title');
            $table->string('image_url');
            $table->string('preparation_time');
            $table->string('cooking_time');
            $table->integer('level');
            $table->integer('serves');
            $table->json('ingredients');
            $table->json('method');
            $table->timestamps();
        */
        return [
            'title'=>$this->faker->title(),
            'image_url'=>$this->faker->imageUrl(),
            'preparation_time'=>strval($this->faker->randomDigitNot(0)) .' min',
            'cooking_time'=>strval($this->faker->randomDigitNot(0)) .' min',
            'level'=>strval($this->faker->numberBetween(1,3)),
            'serves'=>strval($this->faker->randomDigitNot(0)),
            'cook_id'=>User::first()->id,
            'ingredients'=>json_encode([
                '1'=>$this->faker->word,
                '2'=>$this->faker->word,
                '3'=>$this->faker->word,
            ]),
            'method'=>json_encode([
                '1'=>$this->faker->sentence,
                '2'=>$this->faker->sentence,
                '3'=>$this->faker->sentence,
            ]),
        ];
    }
}
