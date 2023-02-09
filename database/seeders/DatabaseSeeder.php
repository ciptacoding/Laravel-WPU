<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        Post::factory(21)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //   'name' => 'Cipta Dwipajaya',
        //   'email' => 'ciptdwpjy@gmail.com',
        //   'password' => bcrypt('1234')
        // ]);

        // Post::create([
        //   'category_id' => 1,
        //   'user_id' => 1,
        //   'title' => 'Judul Pertama',
        //   'slug' => 'judul-pertama',
        //   'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic ipsam autem laudantium, aliquam cum tempora nostrum sequi impedit corporis saepe animi ad',
        //   'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic ipsam autem laudantium, aliquam cum tempora nostrum sequi impedit corporis saepe animi ad. Enim facilis voluptatem ad aspernatur repellat maiores nemo corrupti veniam magni! Modi fugit esse molestias qui non molestiae ratione alias consequuntur vitae est a voluptatibus inventore nobis quis optio facilis exercitationem itaque quae adipisci voluptatem similique, magnam, enim explicabo ipsum. Nulla eius pariatur eaque, voluptates praesentium delectus velit nisi ullam omnis nobis. Atque cupiditate doloribus exercitationem! Fugit officiis consequuntur vitae perferendis ratione maxime id, voluptates voluptatibus numquam nobis pariatur, delectus vero fuga quas nam! Quas assumenda magni corporis?'
        // ]);

        Category::create([
          'name' => 'Web Developer',
          'slug' => 'web-developer'
        ]);

        Category::create([
          'name' => 'Web Design',
          'slug' => 'web-design'
        ]);

        Category::create([
          'name' => 'Devops Engineer',
          'slug' => 'devops-engineer'
        ]);

        Category::create([
          'name' => 'Game Developer',
          'slug' => 'game-developer'
        ]);
    }
}
