<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class Tag extends Model {
   // use Updater, SoftDeletes;
    protected $table = 'tags';
    public $timestamps = false ;
    protected $fillable = array(
        'name'
    );

    public static function getCreateView($id = false, $val = [])
    {
        if ($id)
            $val = Category::find($id);

        return [
            'settings' => VG::getSetting('tags'),
            'val' => $val,
            'views' => [
                [
                    'panel' => [
                        'label' => trans('pos.tags'),
                    ],
                    'items' => [
                        [   'name' => 'name',
                            'validator' => 'required,minlength[2]',
                            'label' => trans('pos.tags'),
                            'placeHolder' => 'Tag',
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
            'settings' => VG::getSetting('tags'),
            'views' => [
                [
                    'label' => trans('pos.tags'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'tags',
                    'ajaxUrl' => 'api/table/tags',
                    'createUrl' => '#/app/facebooks/tags/create',
                    'id' => 'dtCategory', // must have and unique
                    'panel' => [
                        'label' => trans('pos.tags'),
                    ],
                ]
            ]
        ];
    }

}