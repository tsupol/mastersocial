<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookPostTable extends Migration
{
    public function up()
    {
        Schema::create('facebook_post', function(Blueprint $table) {
            $table->increments('id');
            $table->string('post_id');
            $table->string('post_type');
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('category', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
        });
    }

    public function down()
    {
        Schema::drop('facebook_post');
        Schema::drop('category');
    }
}
