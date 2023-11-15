<?php

namespace Database\Seeders;
use App\Models\Post;

use App\Models\User;
use App\Models\Guide;

use App\Models\Category;
use App\Models\GuideCategory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProfilePicture;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name'=>'Bima Wib',
            'username'=>'bimaencun',
            'email'=>'bimawib@gmail.com',
            'password'=> bcrypt('12345678')
        ]);
        // User::create([
        //     'name'=>'Chika Eden',
        //     'email'=>'edeni@gmail.com',
        //     'password'=> bcrypt('12345')
        // ]);

        User::factory(3)->create();
        Post::factory(20)->create();

        Category::create([
            'name'=>'Barista',
            'slug'=>'barista'
        ]);
        Category::create([
            'name'=>'Coffee Tools',
            'slug'=>'coffee-tools'
        ]);
        Category::create([
            'name'=>'Coffee Knowledge',
            'slug'=>'coffee-knowledge'
        ]);
        GuideCategory::create([
            'name'=>'V60',
            'slug'=>'v60'
        ]);
        GuideCategory::create([
            'name'=>'Tubruk',
            'slug'=>'tubruk'
        ]);

        Post::create([
            "title"=>"Judul Satu",
            "slug"=>"judul-satu",
            "excerpt"=>"Lorem Empat dolor sit, amet consectetur adipisicing elit. Vitae, tempora minima. Tempore iste asperiores",
            "body"=>"Lorem Empat dolor sit amet consectetur adipisicing elit. Dignissimos voluptas repellat dolore sit magnam saepe. Eos incidunt ducimus modi beatae fugit alias nihil corrupti! Corporis sapiente tenetur nam nobis optio iure 
            eos perferendis distinctio, dolorem reprehenderit non recusandae voluptatem quae? <br>
            Lorem, Empat dolor sit amet consectetur adipisicing elit. Laudantium quisquam quo provident, aperiam consectetur sequi deserunt iure consequuntur facere, harum neque qui soluta perferendis sit, odit iste aliquid dicta itaque.",
            "category_id" => 1,
            "user_id" => 1
        ]);
        Post::create([
            "title"=>"Judul Dua",
            "slug"=>"judul-dua",
            "excerpt"=>"Lorem Empat dolor sit, amet consectetur adipisicing elit. Vitae, tempora minima. Tempore iste asperiores",
            "body"=>"Lorem Empat dolor sit amet consectetur adipisicing elit. Dignissimos voluptas repellat dolore sit magnam saepe. Eos incidunt ducimus modi beatae fugit alias nihil corrupti! Corporis sapiente tenetur nam nobis optio iure 
            eos perferendis distinctio, dolorem reprehenderit non recusandae voluptatem quae? <br>
            Lorem, Empat dolor sit amet consectetur adipisicing elit. Laudantium quisquam quo provident, aperiam consectetur sequi deserunt iure consequuntur facere, harum neque qui soluta perferendis sit, odit iste aliquid dicta itaque.",
            "category_id" => 1,
            "user_id" => 2
        ]);
        Post::create([
            "title"=>"Judul Tiga",
            "slug"=>"judul-tiga",
            "excerpt"=>"Lorem Empat dolor sit, amet consectetur adipisicing elit. Vitae, tempora minima. Tempore iste asperiores",
            "body"=>"Lorem Empat dolor sit amet consectetur adipisicing elit. Dignissimos voluptas repellat dolore sit magnam saepe. Eos incidunt ducimus modi beatae fugit alias nihil corrupti! Corporis sapiente tenetur nam nobis optio iure 
            eos perferendis distinctio, dolorem reprehenderit non recusandae voluptatem quae? <br>
            Lorem, Empat dolor sit amet consectetur adipisicing elit. Laudantium quisquam quo provident, aperiam consectetur sequi deserunt iure consequuntur facere, harum neque qui soluta perferendis sit, odit iste aliquid dicta itaque.",
            "category_id" => 2,
            "user_id" => 1
        ]);

        // Guide::create([
        // "title" => "Gayo Wine with Tetsu Katsuya Method",
        // "user_id" => 1,
        // "guide_category_id" => 1,
        // "slug" => "gayo-wine-with-tetsu-katsuya-method",
        // "origin" => "Gayo Highland, Aceh",
        // "proses"=> "Wine Process",
        // "notes" => "Red Wine, Fruity",
        // "ratio" => "15",
        // "body" => "[[0.25,45],[0.15,45],[0.20,45],[0.20,45],[0.20,45]]"
        // ]);

        // Guide::create([
        // "title" => "Gayo Wine Tubruk",
        // "user_id" => 2,
        // "guide_category_id" => 2,
        // "slug" => "gayo-wine-tubruk",
        // "origin" => "Gayo Highland, Aceh",
        // "proses"=> "Wine Process",
        // "notes" => "Red Wine, Fruity",
        // "ratio" => "18",
        // "body" => "[[1,180]]"
        // ]);

        ProfilePicture::create([
            "user_id" => 1,
            "profile_pictures" => "https://res.cloudinary.com/ddz9dz0ew/image/upload/v1664258272/mymanualbrew/2022-09-27_055816_urucanooreda.jpg"
        ]);

        ProfilePicture::create([
            "user_id" => 2,
            "profile_pictures" => "https://res.cloudinary.com/ddz9dz0ew/image/upload/v1664258272/mymanualbrew/2022-09-27_055816_urucanooreda.jpg"
        ]);

        ProfilePicture::create([
            "user_id" => 3,
            "profile_pictures" => "https://res.cloudinary.com/ddz9dz0ew/image/upload/v1664258272/mymanualbrew/2022-09-27_055816_urucanooreda.jpg"
        ]);

        ProfilePicture::create([
            "user_id" => 4,
            "profile_pictures" => "https://res.cloudinary.com/ddz9dz0ew/image/upload/v1664258272/mymanualbrew/2022-09-27_055816_urucanooreda.jpg"
        ]);

        ProfilePicture::create([
            "user_id" => 5,
            "profile_pictures" => "https://res.cloudinary.com/ddz9dz0ew/image/upload/v1664258272/mymanualbrew/2022-09-27_055816_urucanooreda.jpg"
        ]);
    }
}
