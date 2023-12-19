<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $judul = $this->faker->sentence();
        return [
            'judul' => $judul,
            'penulis' => $this->faker->name(),
            'harga' => $this->faker->numberBetween(50000, 200000),
            'tgl_terbit' => $this->faker->date('Y-m-d'),
            'buku_seo' => Str::slug($judul)
        ];
    }
}


