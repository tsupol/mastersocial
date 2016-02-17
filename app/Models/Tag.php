<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class Category extends Model {
   // use Updater, SoftDeletes;
    protected $table = 'category';
    public $timestamps = false ;
    protected $fillable = array(
        'name'
    );

    public static function getCreateView($id = false, $val = [])
    {
        if ($id)
            $val = Category::find($id);

        return [
            'settings' => VG::getSetting('categorys'),
            'val' => $val,
            'views' => [
                [
                    'panel' => [
                        'label' => trans('pos.categorys'),
                    ],
                    'items' => [
                        [   'name' => 'name',
                            'validator' => 'required,minlength[2]',
                            'label' => trans('pos.categorys'),
                            'placeHolder' => 'Category',
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
            'settings' => VG::getSetting('categorys'),
            'views' => [
                [
                    'label' => trans('pos.categorys'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'categorys',
                    'ajaxUrl' => 'api/table/categorys',
                    'createUrl' => '#/app/facebooks/categorys/create',
                    'id' => 'dtCategory', // must have and unique
                    'panel' => [
                        'label' => trans('pos.categorys'),
                    ],
                ]
            ]
        ];
    }

}