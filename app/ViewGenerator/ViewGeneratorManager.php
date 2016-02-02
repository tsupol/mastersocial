<?php namespace App\ViewGenerator;

use App\Models\Permission;
use App\Models\CustomerLevel as CusLevel;
use DB;
use Session;
use Auth;
use Redirect;
use App\ViewGenerator\ViewGeneratorManager as VG;

class ViewGeneratorManager {


    public static $FbLongToken  = "CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0" ;


    public function doSomething()
    {
        echo 'Do something!';
    }

    public static $settings = [
        'facebook_inbox' =>[
            'title' => 'facebook',
            'subtitle' => 'facebook inbox',
        ],

        'default' => [
            'title' => 'POS',
            'subtitle' => 'ระบบจัดการหน้าร้าน',
        ],

    ];

    public function getSetting($q = 'default') {
        if(!static::getPermission($q.'.edit') && static::getPermission($q.'.view')) {
            return array_merge(static::$settings[$q], ['readonly' => true]);
        }
        return static::$settings[$q];
    }

    public function getFormSchema($data, $query, $val=false, $settingQuery=false)
    {
        if(!$settingQuery) {
            $settingQuery = preg_replace('/\.\w+/', '', $query);
        }
        if(!isset(static::$settings[$settingQuery])) {
            $settingQuery = 'default';
        }
        if($val) {
            return [ 'data' => $data, 'view' => static::formLang($query), 'val' => $val, 'settings' => static::$settings[$settingQuery]];
        }
        return [ 'data' => $data, 'view' => static::formLang($query), 'settings' => static::$settings[$settingQuery]];
    }

    public function getTableSchema($data, $query, $settingQuery=false)
    {
        if(!$settingQuery) {
            $settingQuery = preg_replace('/\.\w+/', '', $query);
        }
        if(!isset(static::$settings[$settingQuery])) {
            $settingQuery = 'default';
        }
        if(!is_array($data)) {
            $data = $data->toArray();
        }
        return [ 'data' => $data, 'view' => static::tableLang($query), 'settings' => static::$settings[$settingQuery]];
    }

    public static function formLang($query) {
        $table = static::$formSchemas[$query];
        $module = preg_replace('/\..*/', '', $query);
        foreach($table as $k=>$v) {
            if(isset($table['type']) && $table['type'] == 'custom') continue;
            if(isset($v['label'])) {
                $trans = static::myTrans($v['label'], $module)[1];
            } else {
                if(isset($v['name']))
                    $trans = static::myTrans($v['name'], $module)[1];
            }
            if(isset($v['fields'])) {
                foreach($v['fields'] as $kk=>$vv) {
                    if(isset($vv['label'])) {
                        $t = static::myTrans($vv['label'], $module)[1];
                    } else {
                        $t = static::myTrans($vv['name'], $module)[1];
                    }
                    $table[$k]['fields'][$kk]['label'] = $t;
                }
            }
            $table[$k]['label'] = $trans;
        }
        return $table;
    }

//    public static function tableLang($query) {
//        $locale = Session::get('locale');
//        $table = static::$tableSchemas[$query];
//        $module = preg_replace('/\..*/', '', $query);
//        foreach($table['fields'] as $k=>$str) {
//            $table['fields'][$k] = static::myTrans($str, $module);
//        }
//        $table['fields'][$k] = static::myTrans($str, $module);
//        return $table;
//    }

    public static function myTrans($str, $module) {
        $c = strpos($str, '&');
        if($c === false) {
            $out = trans('pos.'.$str);
        } else {
            $out = trans('pos.'.$str, [trans('pos.'.$module)]);
            $str = str_replace('&', '', $str);
        }
        return [$str, $out];
    }

    public static function dataArray($data, $view, $model, $base, $show = []) {
        $aa = [];

        // -- Permissions
        $bView = static::getPermission($base.'.view');
        // $bCreate = getPermission($base.'.create');
        $bEdit = static::getPermission($base.'.edit');
        if($bEdit) $bView = false;
        $bDelete = $bEdit;

        $bShow = [
            'view' => $bView,
            'edit' => $bEdit,
            'delete' => $bDelete,
        ];
        // -- Override
        $bShow = array_merge($bShow, $show);

//        dd($bShow);
        if(isset($bShow['receipt'])) {
            $bShow['receipt'] = static::getPermission('receipts.create');
        }
        if(isset($bShow['buy'])) { // buy
            $bShow['buy'] = static::getPermission('purchases.create');
        }

        foreach($data as $rs) {
            $bReceipt = true;
            $bRefund = true;
            $a = [];
            foreach($view as $v) {
                $a[] = $rs[$v['col']];
            }

            if(is_array($rs)){
                $id = $rs['id'];
                $del = $rs['deleted_at'];
                $pivot_id = $rs['pivot_id'];
            }
            else {
                $id = $rs->id;

                $del = $rs->deleted_at;
                $pivot_id = $rs->pivot_id ;
            }
            // -- receipt
            if(isset($bShow['receipt'])) {
                if($rs['status'] == 'paid') $bReceipt = false;
            }

//            \Log::info(' -buy- '.$bShow['buy']);
            $btn = '';
            if(!empty($bShow['view'])) $btn .= static::viewBtn($id, $model);
            if(!empty($bShow['edit'])) $btn .= static::editBtn($id, $model);
            if(!empty($bShow['delete'])) $btn .= static::deleteBtn($id, $del);
            if(!empty($bShow['buy'])) $btn .= static::buyBtn($id);
            if(!empty($bShow['bill2'])) $btn .= static::bill2Btn($id);
            if(!empty($bShow['receipt']) && $bReceipt) $btn .= static::receiptBtn($id);

            //--- pok 2015-12-23
            if(!empty($bShow['refund']) && $bRefund) $btn .= static::refundBtn($id);
            if(!empty($bShow['stockproduct'])) $btn .= static::stockproductBtn($pivot_id,$id);
            if(!empty($bShow['stockitem'])) $btn .= static::stockitemBtn($pivot_id,$id);


            $a[] = $btn;
            $aa[] = $a;
        }
        return $aa;
    }

    public static function TM($str) {
        $locale = Session::get('locale');
//        app()->setLocale($locale);
        $c = strpos($str, '.');
        if($c === false) {
            return trans('menu.'.$str);
        } else {
//            return substr($str, $c + 1);
//            return trans('menu.'.substr($str, $c+1));
            return trans('menu.'.substr($str, 0, $c), [trans('menu.'.substr($str, $c+1))]);
        }
    }

    public static function getPermission($perm) {
        return isset(Session::get('perm')[$perm]);
//        $pid = Permission::whereName($perm)->select('id')->first();
//        if(is_null($pid)) return false;
//        if(PermRole::wherePermissionId($pid->id)->whereRoleId(Auth::user()->role->id)->count() == 1) return true;
//        return false;
    }

    public static function TA($arr) {
        for($i = 0; $i<count($arr); $i++) {
            $arr[$i] = [$arr[$i], trans('pos.'.$arr[$i])];
        }
        return $arr;
    }

    public static function result($success = true, $message) {
        if($success) {
            return ['status' => 'success', 'message' => $message];
        }
        return ['status' => 'error', 'message' => $message];
    }


    public static  function ParseDayOfWeek($date){
        if ($date==1) {
            $string_date = "วันจันทร์" ;
        }else if ($date==2) {
            $string_date = "วันอังคาร" ;
        }else if ($date==3) {
            $string_date = "วันพุธ" ;
        }else if ($date==4) {
            $string_date = "วันพฤหัส" ;
        }else if ($date==5) {
            $string_date = "วันศุกร์" ;
        }else if ($date==6) {
            $string_date = "วันเสาร์" ;
        }else if ($date==7) {
            $string_date = "วันอาทิตย์" ;
        }else{
            $string_date = "วันอาทิตย์" ;
        }
        return $string_date ;
    }

    // *** Buttons

    public static function editBtn($id, $type) {
        return '<a class="btn btn-blue btn-xs" title="แก้ไข" href="#/app/' . $type . '/edit/' . $id . '"><i class="fa fa-pencil"></i></a>';
    }

    public static function viewBtn($id, $type) {
        return '<a class="btn btn-secondary btn-xs" title="แก้ไข" href="#/app/'.$type.'/edit/'.$id.'">View</a>';
    }

    public static function customBtn($href, $caption, $title = '') {
        return '<a class="btn btn-secondary btn-xs" title="'.$title.'" href="'.$href.'">'.$caption.'</a>';
    }


    public static function deleteBtn($id, $deletedAt) {
        if($deletedAt == null) {
            return '<div class="btn btn-danger btn-xs" title="ลบข้อมูล" onclick="deleteData(this,'.$id.
            ')"><i class="fa fa-trash-o"></i></div>';
        }
        else return '<button class="btn btn-secondary btn-xs" title="restore" onclick="restoreData(this,'.$id.')"><i class="fa fa-refresh"></i></button>';
    }

    public static function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {
            $dates[] = date( $format, $current );
            //$dates[$i]["sum_price"] = 0 ;
            $current = strtotime( $step, $current );

        }
        return $dates;
    }

    public static function dateSearch($val) {
        $date_now = date('Y/m/d') ;
        $date_now_txt = explode('/',$date_now) ;
        $date_now_year = $date_now_txt[0] ;
        $date_now_month = $date_now_txt[1] ;
        $value = explode('/',$val ) ;
        $value[0] = str_pad($value[0], 2, '0', STR_PAD_LEFT);
        if(sizeof($value)==1) {
            $date_search = "$date_now_year-$date_now_month-$value[0]" ;
        }else if(sizeof($value)==2) {
            $value[1] = str_pad($value[1],2, '0', STR_PAD_LEFT);
            $date_search = "$date_now_year-$value[1]-$value[0]" ;
        }else if(sizeof($value)==3) {
            $value[1] = str_pad($value[1],2, '0', STR_PAD_LEFT);
            $date_search = "$value[2]-$value[1]-$value[0]" ;
        }

        return $date_search ;
    }

    // *** Menus

    public static function getMenu() {

        $menu = [
            'facebooks' => [
                'settings' => [
                    'url' => '/app/facebooks',
                    'icon' => 'fa fa-facebook-square',
                    'label' => static::TM('facebooks'),
                ],
                'items' => [
                    ['/facebooks/inbox','facebooks', '-/inbox', static::TM('fb_inbox')],
                    ['/facebooks/conversation/:id', 'facebook/conversation/:id'],
                ],
            ],


            'users' => [
                'settings' => [
                    'url' => '/app/users',
                    'icon' => 'fa fa-user',
                    'label' => static::TM('users'),
                ],
                'items' => [
                    ['/users', 'users', '/', static::TM('list_n.users')],
                    ['/users/create', 'users/create', '-/create', static::TM('create.users')],
                    ['/users/edit/:id', 'users/:id/edit'],

                ],
            ],




        ];

        // *** Permission

        foreach($menu as $k1=>$m1) {
            $count = 0;
            foreach($m1['items'] as $k=>$m2) {
                if(count($m2) < 3) {
                    //unset($m1['items'][$k]);
                    continue;
                }
                $seg = explode('/',$m2[1]);
                if(count($seg) == 1) {

                    $count++;

                } else {
                    if($seg[0] == 'reports') {
                        $last = $seg[1];

                        $count++;

                    } else {
                        $last = $seg[count($seg)-1];

                        $count++;

                    }
                }
            }
            if($count == 0) {
                unset($menu[$k1]);
            }
        }

        return $menu;
    }

    public static function Log($action, $model) {
        $username = Session::get('username');
        $data = date('Y-m-d H:i:s')." {$username} : {$action} {$model}\n";
        if($data != ''){
            //open logs file if exists or create a new one
            $userFile = storage_path('logs/users/'.date('Y-m-d').'_'.$username.'.log');
            $sysFile = storage_path('logs/system/'.date('Y-m-d').'.log');
            $userDir = dirname($userFile);
            if (!is_dir($userDir))
            {
                mkdir($userDir, 0755, true);
            }
            $sysDir = dirname($sysFile);
            if (!is_dir($sysDir))
            {
                mkdir($sysDir, 0755, true);
            }

            $logFile = fopen($userFile, 'a+');
            fwrite($logFile, $data);
            fclose($logFile);
            $logFile = fopen($sysFile, 'a+');
            fwrite($logFile, $data);
            fclose($logFile);
        }
    }


}