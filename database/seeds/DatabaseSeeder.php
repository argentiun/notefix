<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Doctor;
use App\UserSecondarie;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      \DB::table('categories')->insert([
        ['value' => 'Notebooks'],
        ['value' => 'Netbooks'],
        ['value' => 'Tablets'],
        ['value' => 'Celulares']
      ]);

      $user = factory(App\User::class,10)->create();
      $posts =  factory(App\Post::class, 60)->create();


    }
}
