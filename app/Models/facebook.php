<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Session;
use VG;

class Facebook extends Model {

   // use Updater, SoftDeletes;

    protected $table = 'facebook_post';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = array(
        'post_id',
        'post_type',
        'created_by',
        'category_id'
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

//    public static function lastestconversation(){
//        $url =  "https://graph.facebook.com/v2.5/919082208176684/conversations?access_token=".LONGLIVE_ACCESSTOKEN ;
//        $data =  file_get_contents($url);
//        $json = json_decode($data) ;
//        $res = [];
//        foreach ($json->data as $key=>$d){
//            $d_link =   $d->link ;
//            $pieces = explode('user%3A',$d_link) ;
//            $pieces1 = explode('&threadid',$pieces[1]) ;
//            $userId = $pieces1[0] ;
//            $FbCus =  FacebookCustomer::where('fb_uid',$userId)->first();
//
//            if(empty($FbCus)){   //--- if hasn't this customer in DB  Call API for get information
//                $url  = "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=".LONGLIVE_ACCESSTOKEN ;
//                $data = file_get_contents($url);
//                $json = json_decode($data) ;
//                $res[$key]["name"] = $json->name ;
//                $data=[];
//                $data['fb_uid'] = $d->id ;
//                $data['fb_uname'] = $json->name ;
//                $data['status'] = 1  ;
//                $status = FacebookCustomer::create($data);
//            }else{
//                $res[$key]["name"] = $FbCus->fb_uname ;
//            }
//            $res[$key]["id"] =  $d->id ;
//
//        }
//        return json_encode($res) ;
//    }

    
}