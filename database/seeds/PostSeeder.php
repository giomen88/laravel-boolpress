<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Auth;
use App\Models\Category;
use App\Models\Tag;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();
        $user_ids = User::pluck('id')->toArray();
        $tag_ids = Tag::pluck('id')->toArray();


        for($i = 0; $i < 10; $i++) {
            $new_post = new Post();

            $new_post->title = $faker->text(20);
            $new_post->slug = Str::slug($new_post->title. '-');
            $new_post->content = $faker->paragraphs(2, true);
            // $new_post->image = $faker->imageUrl(250, 250);
            $new_post->category_id = Arr::random($category_ids); 
            $new_post->user_id = Arr::random($user_ids);

            $new_post->save();

            $post_tags = [];

            foreach($tag_ids as $tag_id) {
                if($faker->boolean()) $post_tags = $tag_id;
            }

            $new_post->
        }
    }
}
