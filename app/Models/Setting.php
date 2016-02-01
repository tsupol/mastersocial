<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;
use DB;

class Setting extends Model {

    protected $table = 'settings';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
        'key',
        'value',
    );

    public static $keys = [];

    public static function key($key) {
        $val = static::select('value')->where('key', '=', $key)->first();
        if($val == NULL) return '';
        return $val->value;
    }

}