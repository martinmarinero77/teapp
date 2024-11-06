<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    private function downloadImage(int $width, int $height) : ?string {
        $response = Http::get("https://picsum.photos/{$width}/{$height}");
        if ($response->successful()) {
            return base64_encode($response->body());
        }
        return null;
    }
    public function definition(): array
    {
        $base64Image = $this->downloadImage(255, 255);
        if ($base64Image === null) {
            $image = Image::canvas(255, 255, '#ccc');
            $base64Image = $image->encode('data-url');
        }

        return [
            "name"=> $this->faker->sentence(2,false),
            "description"=> $this->faker->paragraph(4, true),
            "image" => $base64Image,
        ];
    }
}
