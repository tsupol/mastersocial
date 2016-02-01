<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Customer;
use App\Models\Setting;
use Carbon\Carbon;
use VG;
use Input;
use Session;


class SettingController extends Controller
{

    public static $items = ['company_name','company_abbr','company_logo', 'company_logo_light'];

    public function index()
    {
        $val = [];
        foreach(static::$items as $key) {
            $val[$key] = Setting::key($key);
        }
        $item = [
            [   'name' => 'company_name',
                'validator' => 'required',
                'label' => trans('pos.company_name'),
            ],
            [   'name' => 'company_abbr',
                'validator' => 'required',
                'label' => trans('pos.company_abbr'),
            ],
            [   'name' => 'company_logo',
                'validator' => 'required',
                'type' => 'dropzone',
                'uploadUrl' => 'api/system/upload',
                'csrf_token' => csrf_token(),
                'maxFiles' => 1,
                'label' => trans('pos.company_logo'),
            ],
            [   'name' => 'company_logo_light',
                'validator' => 'required',
                'type' => 'dropzone',
                'uploadUrl' => 'api/system/upload',
                'csrf_token' => csrf_token(),
                'maxFiles' => 1,
                'label' => trans('pos.company_logo_light'),
            ],
        ];

        return [
            'settings' => VG::getSetting('users'),
            'val' => $val,
            'views' => [
                [
                    'panel' => [
                        'label' => trans('pos.users'),
                    ],
                    'items' => $item
                ]
            ]
        ];
    }

    public function create()
    {
    }

    public function store()
    {
        $data = Input::all();
        // $data = array_diff_key($data, array_flip(['id','confirm_password', '_method','deleted_at','deleted_by','updated_at','created_at']));
        foreach(static::$items as $key) {
            if(!Input::has($key)) {
                return VG::result(false, 'invalid key: '.$key);
            }
            $item = Setting::where('key', '=', $key)->first();
            if(empty($item)) {
                $item = Setting::create(['key' => $key, 'value' => Input::get($key)]);
            } else {
                $item->value = $data[$key];
                $item->save();
            }
        }
        return VG::result(true, ['action' => 'update']);
//        if($status == 1) {
//            return VG::result(true, ['action' => 'update', 'id' => $id]);
//        }
//        return VG::result(false, 'failed!');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {

    }


    public function update($id)
    {

    }

    public function destroy($id)
    {
    }
}