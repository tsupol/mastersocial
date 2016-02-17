<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class Pattern extends Model {
   // use Updater, SoftDeletes;
    protected $table = 'patterns';
    public $timestamps = false ;
    protected $fillable = array(
        'name'
    );

    public static function getCreateView($id = false, $val = [])
    {
        if ($id)
            $val = Category::find($id);

        return [
            'settings' => VG::getSetting('patterns'),
            'val' => $val,
            'views' => [
                [
                    'panel' => [
                        'label' => trans('pos.patterns'),
                    ],
                    'items' => [
                        [   'name' => 'name',
                            'validator' => 'required,minlength[2]',
                            'label' => trans('pos.patterns'),
                            'placeHolder' => 'ขื่อ Pattern',
                        ],
                        [   'name' => 'desc',
                            'validator' => 'required,minlength[2]',
                            'label' => trans('pos.pattern_desc'),
                            'placeHolder' => 'Pattern ที่ต้องการ',
                            'type' => 'area',
                        ]
                    ]
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

            [   'name' => 'notes',
                'label' => trans('pos.notes'),

            ],

        ];
    }

    public static function getIndexView()
    {
        return [
            'settings' => VG::getSetting('tags'),
            'views' => [
                [
                    'label' => trans('pos.tags'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'tags',
                    'ajaxUrl' => 'api/table/patterns',
                    'createUrl' => '#/app/facebooks/patterns/create',
                    'id' => 'dtCategory', // must have and unique
                    'panel' => [
                        'label' => trans('pos.tags'),
                    ],
                ]
            ]
        ];
    }

}