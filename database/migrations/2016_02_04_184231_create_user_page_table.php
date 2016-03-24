<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPageTable extends Migration
{
    public function up()
    {
        Schema::create('user_page', function(Blueprint $table) {
            $table->increments('id');
            $table->string('fb_id');
            $table->string('page_id');
            $table->string('page_name');
            $table->string('longlive_token');
            $table->timestamps();
            $table->dateTime('actived_at');
            $table->boolean('is_active') ;
        });
    }

    public function down()
    {
        Schema::drop('user_page');
    }
}
