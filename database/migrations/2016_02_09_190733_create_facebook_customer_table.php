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
            $table->string('from_id');   //--- facebook user id
            $table->string('from_name');   //--- facebook user name
            $table->string('tid');   //--- facebook tid conversation
            $table->string('page_id');
            $table->string('snippet');
            $table->string('lasted_at');
            $table->integer('status')->unsigned();   //--- 0 : close , 1 : open , 2 : pendding
            $table->timestamps();
        });
        Schema::create('facebook_chat', function(Blueprint $table) {
            $table->increments('id');
//            $table->string('fromName');   //--- facebook chat message from name
            $table->string('fromId');   //--- facebook chat message from id
            $table->string('tid');   //--- facebook conversation id
            $table->string('mid');   //--- facebook message id
            $table->timestamps();
            $table->string('shares_link');   //--- url object share
            $table->string('shares_name');   //--- url object share
            $table->string('attachments');   //--- url object attachments
            $table->string('message');   //--- message text
            $table->dateTime('chat_at'); //--- chat id
            $table->integer('section_id')->unsigned(); //----   relation : session
        });

        Schema::create('session_tag', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id');
            $table->integer('tag_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

//        Schema::create('facebook_chat_section', function(Blueprint $table) {
//            $table->increments('id');
//            $table->string('uid');   //--- facebook user id
//            $table->string('tid');
//            $table->integer('status')->unsigned();      //  0 = close , 1 = open
//            $table->timestamps();
//        });

        Schema::create('session', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tid');    //--- relation : facebook conversation id
            $table->integer('count_time');     //---minute
            $table->integer('count_message_page')->unsigned();
            $table->integer('count_message_customer')->unsigned();
            $table->string('mid');   //--- facebook message id
            $table->integer('start_chat_id')->unsigned();   //--- start id message
            $table->integer('end_chat_id')->unsigned();   //--- end id message
            $table->dateTime('start_chat_at'); //--- start chat time
            $table->dateTime('end_chat_at'); //--- end chat time
            $table->integer('status_id')->unsigned();   //--- 1= open ,  2= Close , 3 = Pending
            $table->timestamps();
        });


        Schema::create('patterns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desc');
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
        Schema::drop('session_tag');
        Schema::drop('session');
        Schema::drop('tags');
        Schema::drop('patterns');

    }
}
