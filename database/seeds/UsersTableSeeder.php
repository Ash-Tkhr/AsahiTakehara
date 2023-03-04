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
        DB::table('user')->insert([
            'name'=>'ボクシングファン',
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
            'name'=>'相撲ファン',
            'email'=>'a@a',
            'password'=>'12345678',
            'image'=>'',
            'profile'=>'',
            'role'=>'1',
            'del_flg'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
