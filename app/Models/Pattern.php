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
        'name',
        'desc'
    );

    public static function getCreateView($id = false, $val = [])
    {
        if ($id)
            $val = Static::find($id);

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
            [   'col' => 'name',
                'label' => trans('pos.name'),
            ],
        ];
    }

    public static function getIndexView()
    {
        return [
            'settings' => VG::getSetting('patterns'),
            'views' => [
                [
                    'label' => trans('pos.patterns'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'patterns',
                    'ajaxUrl' => 'api/table/patterns',
                    'createUrl' => '#/app/facebooks/patterns/create',
                    'id' => 'dtCategory', // must have and unique
                    'panel' => [
                        'label' => trans('pos.patterns'),
                    ],
                ]
            ]
        ];
    }

}