<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
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
                'user_id'=>'5',
                'article_id'=>'1',
                'author'=>'1',
                'text'=>'テスト',
                'comment_to'=>'0',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'5',
                'article_id'=>'2',
                'author'=>'1',
                'text'=>'テスト',
                'comment_to'=>'0',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'5',
                'article_id'=>'3',
                'author'=>'1',
                'text'=>'テスト',
                'comment_to'=>'0',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'5',
                'article_id'=>'4',
                'author'=>'1',
                'text'=>'テスト',
                'comment_to'=>'0',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'article_id'=>'1',
                'author'=>'0',
                'text'=>'テスト',
                'comment_to'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]
    ];

    foreach($params as $param){
        DB::table('comments')->insert($param);
    };
    }
}
