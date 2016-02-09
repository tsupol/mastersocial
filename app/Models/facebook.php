<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class Facebook extends Model {

   // use Updater, SoftDeletes;

    protected $table = 'facebook_post';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
        'post_id',
        'post_type',
        'created_by'
    );

    public static $keys = [];

    public static function getCreateView($id = false, $val = [])
    {
        if($id) {
            $val = Facebook::find($id);

        }

        return [
            'settings' => VG::getSetting('facebooks'),

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
            [   'col' => 'post_id',
                'label' => trans('pos.post_id', [trans('pos.products')]),
                'filter' => 'text',
            ],
            [   'col' => 'post_type',
                'label' => trans('pos.post_type'),
                'filter' => 'text',
            ],
            [   'col' => 'created_at',
                'label' => trans('pos.created_at'),

            ],
        ];
    }

    public static function getIndexView()
    {
        return [
            'settings' => VG::getSetting('facebooks'),
            'views' => [
                [
                    'label' => trans('pos.facebooks'),
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'facebooks',

                    'ajaxUrl' => 'api/table/facebooks',
                    'createUrl' => '#/app/facebooks/create',
                    'id' => 'dtFacebooks', // must have and unique
                    'panel' => [
                        'label' => trans('pos.facebooks'),
                    ],
                ]
            ]
        ];
    }


    // ----- relationships

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'procedure_product', 'procedure_id', 'product_id')->withPivot('amount')->withTimestamps();
        // their model, pivot table name, our id, their id
    }
    
    public function item() {
        return $this->belongsToMany('App\Models\Item', 'procedure_item', 'procedure_id', 'item_id')->withPivot('amount')->withTimestamps();
        // their model, pivot table name, our id, their id
    }

    public static function gencode()
    {

        $code_length = 5;
        $max = static::withTrashed()->max('id') ;

        if (empty($max)) {
            //--- กรณ๊ไม่มีข้อมูลในระบบ
//          echo "CASE 1 <BR>" ;
            $code_increment = str_pad(1, $code_length, '0', STR_PAD_LEFT);
            $code = "PC" . $code_increment;
        } else {
            //--- กรณีมีข้อมูลในระบบ
//          echo "CASE 1 <BR>" ;
            $pushval = $max + 1;
            $code_increment = str_pad($pushval, $code_length, '0', STR_PAD_LEFT);
            $code = "PC" . $code_increment;
        }

        return $code;

    }

    
}