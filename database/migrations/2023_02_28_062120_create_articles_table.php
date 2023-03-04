<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('category1');
            $table->integer('category2')->nullable();
            $table->integer('category3')->nullable();
            $table->integer('category4')->nullable();
            $table->integer('category5')->nullable();
            $table->string('title','40');
            $table->string('image','500')->nullable();
            $table->text('text');
            $table->integer('interest')->default(0);
            $table->integer('repeat')->default(0);
            $table->integer('study')->default(0);
            $table->integer('answer')->default(0);
            $table->integer('reaction')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
