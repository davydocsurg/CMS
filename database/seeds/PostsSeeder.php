<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Identicon\Identicon;
use Illuminate\Support\Facades\Hash;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'avatar' => 'images/c1.png',
            // 'avatar' => (new Identicon())->getImageDataUri('John Doe', 256),
            'password' => Hash::make('password')
        ]);

        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'avatar' => 'images/next.jpg',
            // 'avatar' => (new Identicon())->getImageDataUri('Jane Doe', 256),
            'password' => Hash::make('password')
        ]);

        $category1 = Category::create([
            'name' => 'Dogs'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        // $category4 = Category::create([
        //     'name' => 'Language'
        // ]);

        $tag1 = Tag::create([
            'name' => 'customers'
        ]);

        $tag2 = Tag::create([
            'name' => 'jobs'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $tag4 = Tag::create([
            'name' => 'dogs'
        ]);

        $post1 = $author2->posts()->create([
            'title' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category1->id,
            'image' => 'images/3-fullbody.jpg'
        ]);

        $post2 = $author1->posts()->create([
            'title' => 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category2->id,
            'image' => 'images/welcome/blog/cat-post/cat-post-1.jpg'
        ]);

        $post3 = $author2->posts()->create([
            'title' => 'Why do we use it?',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category3->id,
            'image' => 'images/welcome/login.jpg'
        ]);

        $post4 = $author1->posts()->create([
            'title' => 'Can you help translate this site into a foreign language ? ',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category2->id,
            'image' => 'images/welcome/elements/g4.jpg'
        ]);

        $post5 = $author2->posts()->create([
            'title' => 'Chinese Shar Pei...',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category1->id,
            'image' => 'images/32941854-chinese-shar-pei-sitting-isolated-on-white-background.jpg'
        ]);

        $post1->tags()->attach([$tag1->id, $tag4->id]);
        $post2->tags()->attach([$tag3->id, $tag2->id]);
        $post3->tags()->attach([$tag2->id, $tag1->id]);
        $post4->tags()->attach([$tag2->id, $tag3->id]);
        $post5->tags()->attach([$tag4->id, $tag1->id]);
    }
}
