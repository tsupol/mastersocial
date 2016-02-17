<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class UserPage extends Model
{

    protected $table = 'user_page';
    public $timestamps = true;
    protected $fillable = array(
        'fb_id',
        'page_id',
        'page_name',
        'longlive_token',
        'actived_at'
    );




}