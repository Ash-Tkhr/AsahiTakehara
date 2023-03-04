<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LoguesTableSeeder extends Seeder
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
                'user_id'=>'1',
                'article_id'=>'1',
                'date'=>'2023-03-03',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'2',
                'article_id'=>'2',
                'date'=>'2023-03-03',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'3',
                'article_id'=>'1',
                'date'=>'2023-03-03',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'4',
                'article_id'=>'1',
                'date'=>'2023-03-03',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'article_id'=>'1',
                'date'=>'2023-03-04',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]
    ];

    foreach($params as $param){
        DB::table('logues')->insert($param);
    };
    }
}
