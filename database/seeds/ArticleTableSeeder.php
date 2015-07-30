<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                    $type = '';

        for($i = 1 ; $i <= 160 ;$i++)
        {
            if($i <= 20)
                $type = 'World';
            if($i > 20)
                $type = 'Sports';
            if($i > 40)
                $type = 'Health';
            if($i > 60)
                $type = 'Entertainment';
            if($i > 80)
                $type = 'Business';
            if($i > 100)
                $type = 'LifeStyle';
            if($i > 120)
                $type = 'Tech';
            if($i > 140)
                $type = 'Food';
            $imp = 0;
            if($i%2==0)
            {
                $imp = 0;
            }
            else{
                $imp = 1;
            }
            Article::create(array(
            'id'=>$i,
            'heading' => 'Sample Heading '.$i.' for '.$type,
            'sub_heading'=>'Eloquent allows you to access your relations via dynamic properties.',
            'body'=>'The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table.',
            'author'=>'Farhan Ahmed',
            'image_url'=>'http://i.dawn.com/large/2015/07/55a103aea2d05.jpg?r=128877677',
            'source_url'=> 'http://www.dawn.com/news/1193848/south-waziristan-militant-attack-kills-four-security-personnel',
            'type'=>$type,
            'slug'=>"simple-heading-".$i,
            'importance'=>$imp,
            'published_at'=> Carbon\Carbon::now()
            ));
        }
    }
}
