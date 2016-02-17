<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class FacebookChat extends Model {

   // use Updater, SoftDeletes;

    protected $table = 'facebook_chat';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
//        'fromName',
        'fromId',
        'tid',
        'mid',
        'shares',
        'attachments',
        'message',
        'chat_at',
        'section_id'
    );

    public static $keys = [];


    
}