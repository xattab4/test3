<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $node = Category::create(['title' => 'Сетевое оборудование']);
        $node->children()->create(['title' => 'Роутеры']);
        $node->children()->create(['title' => 'Модемы']);
        $node->children()->create(['title' => 'Кабели']);
        $node->children()->create(['title' => 'Переходники']);

        Category::create(['title' => 'Лицо']);
        Category::create(['title' => 'Тело']);
        Category::create(['title' => 'Макияж']);
        Category::create(['title' => 'Ногти']);
        Category::create(['title' => 'Ресницы']);
        Category::create(['title' => 'Гримм']);
    }
}
