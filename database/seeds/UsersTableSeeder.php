<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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
                    'name'=>'サッカーファン',
                    'email'=>'a@a',
                    'password'=>'12345678',
                    'image'=>'',
                    'profile'=>'',
                    'role'=>'1',
                    'del_flg'=>'1',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ],
                [
                    'name'=>'フェンシングファン',
                    'email'=>'a@a',
                    'password'=>'12345678',
                    'image'=>'',
                    'profile'=>'',
                    'role'=>'1',
                    'del_flg'=>'1',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ],
                [
                    'name'=>'バスケファン',
                    'email'=>'a@a',
                    'password'=>'12345678',
                    'image'=>'',
                    'profile'=>'',
                    'role'=>'1',
                    'del_flg'=>'1',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ],
                [
                    'name'=>'テニスファン',
                    'email'=>'a@a',
                    'password'=>'12345678',
                    'image'=>'',
                    'profile'=>'',
                    'role'=>'1',
                    'del_flg'=>'1',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ],
                [
                    'name'=>'陸上ファン',
                    'email'=>'a@a',
                    'password'=>'12345678',
                    'image'=>'',
                    'profile'=>'',
                    'role'=>'1',
                    'del_flg'=>'1',
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]
        ];
    
        foreach($params as $param){
            DB::table('users')->insert($param);
        };
    }
}
