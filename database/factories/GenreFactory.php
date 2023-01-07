<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->getGenre(),
            'description' => $this->faker->paragraph(),
            'picture' =>$this->getImage(rand(1,4))
        ];
    }

    public function getGenre()
    {
        $genres = ['detective', 'romance', 'fantasy', 'fiction'];
        return $genres[rand(0,count($genres)-1)];
    }

    public function getImage(int $image_number)
    {
        $path = storage_path() . "/seed_pictures/genres/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(300)->encode('jpg');
        Storage::disk('public')->put('pictures/genres/' . $image_name, $resize->__toString());
        return 'pictures/genres/' . $image_name;
    }
}
