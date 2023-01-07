<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'picture' => $this->getImage(rand(1,3)),
            'description' => $this->faker->paragraph()
        ];

    }

    public function getImage(int $image_number)
    {
        $path = storage_path() . "/seed_pictures/authors/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(300)->encode('jpg');
        Storage::disk('public')->put('pictures/authors/' . $image_name, $resize->__toString());
        return 'pictures/authors/' . $image_name;
    }

}
