<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::table('authors')->insert([
            ['name' => 'Чехов А. П.'],
            ['name' => 'Шолохов М. А.'],
            ['name' => 'Бунин И. А.'],
            ['name' => 'Булгаков М. А.'],
            ['name' => 'Твардовский А. Т.'],
        ]);

        DB::table('genres')->insert([
            ['title' => 'Роман'],
            ['title' => 'Поэма'],
            ['title' => 'Стихотворение'],
            ['title' => 'Рассказ'],
            ['title' => 'Комедия'],
        ]);

        DB::table('books')->insert([
            ['title' => 'Вишневый сад', 'author_id' => '1', 'genre_id' => '5', 'amount' => '10'],
            ['title' => 'Тихий Дон', 'author_id' => '2', 'genre_id' => '1', 'amount' => '5'],
            ['title' => 'Тёмные аллеи', 'author_id' => '3', 'genre_id' => '4', 'amount' => '7'],
            ['title' => 'Мастер и Маргарита', 'author_id' => '4', 'genre_id' => '1', 'amount' => '6'],
            ['title' => 'Василий Тёркин', 'author_id' => '5', 'genre_id' => '3', 'amount' => '4'],
        ]);


        DB::table('readers')->insert([
            ['name' => 'Новиков В. Ш.', 'phone' => '+79208348234'],
            ['name' => 'Бурый С. В.', 'phone' => '+79968398342'],
            ['name' => 'Краснов П. В.', 'phone' => '+79106483926'],
            ['name' => 'Никулин П. М.', 'phone' => '+79694738946'],
            ['name' => 'Афанасьева Д. В.', 'phone' => '+79107582396'],
        ]);

        DB::table('story')->insert([
            ['reader_id' => '1', 'book_id' => '1'],
            ['reader_id' => '2', 'book_id' => '2'],
            ['reader_id' => '3', 'book_id' => '3'],
            ['reader_id' => '4', 'book_id' => '4'],
            ['reader_id' => '1', 'book_id' => '5'],
        ]);
    }
}
