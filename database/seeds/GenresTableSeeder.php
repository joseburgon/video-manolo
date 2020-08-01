<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            "id" => 28,
            "name" => "Acción"
        ]);

        Genre::create([
            "id" => 12,
            "name" => "Aventura"
        ]);

        Genre::create([
            "id" => 16,
            "name" => "Animación"
        ]);

        Genre::create([
            "id" => 35,
            "name" => "Comedia"
        ]);

        Genre::create([
            "id" => 88,
            "name" => "Crimen"
        ]);

        Genre::create([
            "id" => 99,
            "name" => "Documental"
        ]);

        Genre::create([
            "id" => 18,
            "name" => "Drama"
        ]);

        Genre::create([
            "id" => 10751,
            "name" => "Familia"
        ]);

        Genre::create([
            "id" => 14,
            "name" => "Fantasía"
        ]);

        Genre::create([
            "id" => 36,
            "name" => "Historia"
        ]);

        Genre::create([
            "id" => 27,
            "name" => "Terror"
        ]);

        Genre::create([
            "id" => 10402,
            "name" => "Música"
        ]);

        Genre::create([
            "id" => 9648,
            "name" => "Misterio"
        ]);

        Genre::create([
            "id" => 10749,
            "name" => "Romance"
        ]);

        Genre::create([
            "id" => 878,
            "name" => "Ciencia ficción"
        ]);

        Genre::create([
            "id" => 10770,
            "name" => "Película de TV"
        ]);

        Genre::create([
            "id" => 53,
            "name" => "Suspense"
        ]);

        Genre::create([
            "id" => 10752,
            "name" => "Bélica"
        ]);

        Genre::create([
            "id" => 37,
            "name" => "Western"
        ]);
    }
}
