<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title"=>"Judul Satu",
            "slug"=>"judul-satu",
            "author"=>"Edeni",
            "body"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad qui est, asperiores nam accusamus veniam doloremque eaque, culpa molestiae at velit quis voluptas dolorum? Aperiam iusto tempora veritatis? Accusantium, dignissimos!. Ad qui est, asperiores nam accusamus veniam doloremque eaque, culpa molestiae at velit quis voluptas dolorum? Aperiam iusto tempora veritatis? Accusantium, dignissimos!"
        ],
        [
            "title"=>"Judul Dua",
            "slug"=>"judul-dua",
            "author"=>"Thoy",
            "body"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad qui est, asperiores nam accusamus veniam doloremque eaque, culpa molestiae at velit quis voluptas dolorum? Aperiam iusto tempora veritatis? Accusantium, dignissimos!. Ad qui est, asperiores nam accusamus veniam doloremque eaque, culpa molestiae at velit quis voluptas dolorum? Aperiam iusto tempora veritatis? Accusantium, dignissimos!"
        ]
    ];

    public static function all(){
        return collect(self::$blog_posts); 
        //karena properti static, biasanya this->$var... dalam bentuk collection
    }

    public static function find($slug){
        $posts = static::all(); 
        // static untuk method static self untuk var static
        
        return $posts->firstWhere('slug',$slug);
    }

}
