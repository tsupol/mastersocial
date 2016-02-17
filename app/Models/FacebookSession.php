<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class FacebookSession extends Model {

   // use Updater, SoftDeletes;

    protected $table = 'session';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
        'tid',
        'count_time',
        'count_message_page',
        'count_message_customer',
        'mid',
        'start_chat_id',
        'end_chat_id',
        'start_chat_at',
        'end_chat_at',
        'status_id'
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
            $val = FacebookSession::find($id);

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
                    'template' => 'gen/tpls/custom/facebook/facebooks-session-list.html',
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
            [   'col' => 'from_name',
                'label' => trans('pos.from_name'),
                'filter' => 'text',
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

                    'ajaxUrl' => 'api/table/facebooks-session',
                    'createUrl' => '#/app/facebooks/create',     // อาจจะเอาไว้ทำ set tag
                    'id' => 'dtFacebookSession', // must have and unique
                    'panel' => [
                        'label' => trans('pos.facebooks'),
                    ],
                ]
            ]
        ];
    }


    public static function getTableListView()
    {
        return [
            [   'col' => 'id',
                'label' => trans('pos.id'),
                'width' => '50px',
            ],
            [   'col' => 'status_id',
                'label' => trans('pos.status_id'),
                'filter' => 'text',
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

    public static function getListView($id)
    {
        return [
            'settings' => VG::getSetting('session'),
            'views' => [
                [
                    'label' => trans('pos.session'),
                    'type' => 'genTable',
                    'fields' => static::getTableListView(),
                    'data' => 'session',
                    'ajaxUrl' => 'api/table/fb-session-list/'.$id,

                    'id' => 'dtFacebookSessionList', // must have and unique
                    'panel' => [
                        'label' => trans('pos.facebooks'),
                    ],
                ]
            ]
        ];
    }



    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'session_tag' , 'session_id','tag_id');
        // their model, pivot table name, our id, their id
    }

}