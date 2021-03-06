<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class FacebookChatTag extends Model {

   // use Updater, SoftDeletes;

    protected $table = 'session_tag';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
        'session_id' ,
        'tid',
        'tag_id',
    );

    public static $keys = [];

    public static function getFormData($id = false) {

        $initData = [];
        return array_merge([
            'category' => Category::all(),
        ], static::$keys, $initData);
    }

    public static function getCreateView($id = false, $val = [])
    {
        if($id) {
            $val = Facebook::find($id);

        }

        return [



            'settings' => VG::getSetting('facebooks'),
            'data' => static::getFormData(),
            'val' => $val,
            'views' => [
                [
                    'label' => trans('pos.facebooks'),
                    'type' => 'custom',
                    'csrf_token' => csrf_token(),
                    'controller' => '',
                    'template' => 'gen/tpls/custom/facebook/facebooks-from.html',
                    'panel' => [
                        'label' => trans('pos.facebooks'),
                    ],
                ]
            ]
        ];
    }

    public static function getTableView()
    {
        return [
            [   'col' => 'id',
                'label' => trans('pos.id'),
                'width' => '50px',
            ],
            [   'col' => 'created_at',
                'label' => trans('pos.created_at'),
                'filter' => 'text',
            ],
            [   'col' => 'count_time',
                'label' => trans('pos.count_time'),
                'filter' => 'text',
            ],
            [   'col' => 'count_message_customer',
                'label' => trans('pos.count_message_customer'),
            ],
            [   'col' => 'tags',
                'label' => trans('pos.tags'),
            ],
        ];
    }

    public static function getIndexView()
    {
        return [
            'settings' => VG::getSetting('session'),
            'views' => [
                [
                    'label' => trans('pos.session'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'session',

                    'ajaxUrl' => 'api/table/facebooks-chat-close',
                    'createUrl' => '#/app/facebooks/create',     // อาจจะเอาไว้ทำ set tag
                    'id' => 'dtFacebookChatClose', // must have and unique
                    'panel' => [
                        'label' => trans('pos.facebooks'),
                    ],
                ]
            ]
        ];
    }

    public function tags() {
        return $this->belongsToMany('App\Models\FacebookSession', 'session_tag', 'session_id', 'tag_id')->withTimestamps();
        // their model, pivot table name, our id, their id
    }

}