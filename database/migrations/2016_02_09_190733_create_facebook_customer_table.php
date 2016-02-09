<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_customer', function(Blueprint $table) {
            $table->increments('id');
            $table->string('fb_uid');   //--- facebook user id
            $table->string('fb_uname');   //--- facebook user name
            $table->integer('status')->unsigned();   //--- 0 : close , 1 : open , 2 : pendding
            $table->timestamps();
        });
        Schema::create('facebook_chat', function(Blueprint $table) {
            $table->increments('id');
            $table->string('fc_id');    //--- relation : facebook_customer id
            $table->string('fb_uid');   //--- facebook user id
            $table->string('fb_tid');   //--- facebook conversation id
            $table->string('fb_mid');   //--- facebook message id
            $table->timestamps();
        });
        Schema::create('facebook_chat_tag', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fb_tid')->unsigned();   //--- relation : facebook conversation id
            $table->integer('tag_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('facebook_chat_close', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fb_tid')->unsigned();    //--- relation : facebook conversation id
            $table->string('time');
            $table->integer('count_message')->unsigned();
            $table->string('fb_mid');   //--- facebook message id
            $table->timestamps();
        });
        Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('facebook_customer');
        Schema::drop('facebook_chat');
        Schema::drop('facebook_chat_tag');
        Schema::drop('tags');

    }
}
