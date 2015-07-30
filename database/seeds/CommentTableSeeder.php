<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 3 ; $i <= 20 ; $i++)
        {
            \App\Comment::create(
            ["id"=>$i,
             "name" => "ABCD",
             "email"=>"abcd@gmail.com",
             "body"=>"hello this is cool website",
             "article_id" =>1,
             "created_at"=> \Carbon\Carbon::now(),
             "updated_at"=> \Carbon\Carbon::now()
            ]);
        }
    }
}
