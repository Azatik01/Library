<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'author' => $this->getUser(),
            'rating' => rand(1, 5),
            'description' => $this->faker->sentence(),
            'book_id' => rand(1, 4),
            'user_id' => rand(1,3)
        ];
    }

//    public function getUser()
//    {
//        $users_array = [];
//        $users = User::all();
//        foreach ($users as $user)
//        {
//            $users_array[] = $user->name;
//        }
//        return $users_array[rand(0, count($users_array)-1)];
//    }
}
