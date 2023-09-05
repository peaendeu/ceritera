<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Category::create([
      'name' => 'Musik',
      'slug' => 'musik',
    ]);

    Category::create([
      'name' => 'Personal',
      'slug' => 'personal',
    ]);

    Category::create([
      'name' => 'Liburan',
      'slug' => 'liburan',
    ]);

    Category::create([
      'name' => 'Kuliner',
      'slug' => 'kuliner',
    ]);

    Category::create([
      'name' => 'Hiburan',
      'slug' => 'hiburan',
    ]);

    Category::create([
      'name' => 'Teknologi',
      'slug' => 'teknologi',
    ]);

    User::factory(5)->create();
    Post::factory(50)->create();
  }
}
