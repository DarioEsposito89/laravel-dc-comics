<?php

namespace Database\Seeders;
use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach($comics as $comic){
            $new_comic = new Comic();
            $new_comic->fill($comic);
            $new_comic->artists = implode(", ", $comic['artists']);
            $new_comic->writers =  implode(", ", $comic['writers']);
            $new_comic->save();
        }
    }
}
