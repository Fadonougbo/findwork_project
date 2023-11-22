<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listining>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tagList=['laravel','php','adonisJS','nextJS','javascript','css','html','reactJS'];
        $randomTag=fake()->randomElements($tagList,3);
        
        return [
            'title' => fake()->unique()->jobTitle(),
            'tags'=>implode(',',$randomTag),
            'company'=>fake()->company(),
            'location'=>fake()->streetAddress(),
            'email' => fake()->unique()->safeEmail(),
            'website'=>fake()->url(),
            'slug'=>fake()->slug(4),
            'description'=>fake()->sentences(8,true)
        ];
    }
}
