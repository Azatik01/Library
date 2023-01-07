<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'picture' => $this->getImage(rand(1,4)),
            'description' => $this->faker->paragraph(),
            'author_id' => rand(1,4),
            'price' => $this->faker->randomNumber()
        ];
    }

    public function getImage(int $image_number)
    {
        $path = storage_path() . "/seed_pictures/books/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(300)->encode('jpg');
        Storage::disk('public')->put('pictures/books/' . $image_name, $resize->__toString());
        return 'pictures/books/' . $image_name;
    }

}
