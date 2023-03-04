<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
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
            'name'=>'陸上',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],[
            'name'=>'フェンシング',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]
    ];

    foreach($params as $param){
        DB::table('categories')->insert($param);
    };
    }
}
