<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TopicsTableSeeder extends Seeder
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
                'category1'=>'1',
                'category2'=>'3',
                'category3'=>'4',
                'category4'=>'5',
                'category5'=>'6',
                'title'=>'テスト１',
                'image'=>'',
                'text'=>'テスト１',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'category1'=>'1',
                'category2'=>'3',
                'category3'=>'4',
                'category4'=>'5',
                'category5'=>'6',
                'title'=>'テスト5',
                'image'=>'',
                'text'=>'テスト',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'category1'=>'1',
                'category2'=>'3',
                'category3'=>'4',
                'category4'=>'5',
                'category5'=>'6',
                'title'=>'テスト2',
                'image'=>'',
                'text'=>'テスト',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'category1'=>'1',
                'category2'=>'3',
                'category3'=>'4',
                'category4'=>'5',
                'category5'=>'6',
                'title'=>'テスト3',
                'image'=>'',
                'text'=>'テスト',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>'1',
                'category1'=>'1',
                'category2'=>'3',
                'category3'=>'4',
                'category4'=>'5',
                'category5'=>'6',
                'title'=>'テスト4',
                'image'=>'',
                'text'=>'テスト',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]
    ];

    foreach($params as $param){
        DB::table('topics')->insert($param);
    };
    }
}
