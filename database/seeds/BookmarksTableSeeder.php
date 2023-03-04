<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params=[
            [
                'user_id'=>'2',
                'article_id'=>'1',
                'chaining'=>'3',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'2',
                'article_id'=>'2',
                'chaining'=>'4',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'2',
                'article_id'=>'3',
                'chaining'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'3',
                'article_id'=>'4',
                'chaining'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'4',
                'article_id'=>'5',
                'chaining'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]
    ];

    foreach($params as $param){
        DB::table('bookmarks')->insert($param);
    };
    }
}
