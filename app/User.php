<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use VG;

class User extends Authenticatable
{
    use SoftDeletes;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'fbuid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public static $keys = [];





    public static function getFormData($id = false) {

        $initData = [];
        return array_merge([
            'roles' => Role::all(),
            'groups' => Group::all(),
            'branches' => Branch::all(),
        ], static::$keys, $initData);
    }

    public static function getCreateView($val = []) {

        $item = [
            [   'name' => 'name',
                'validator' => 'required,minlength[3]',
                'label' => trans('pos.user_cr_name'),
            ],
            [   'name' => 'f_name',
                'validator' => 'required,minlength[3]',
                'label' => trans('pos.user_cr_f_name'),
            ],
            [   'name' => 'l_name',
                'validator' => 'required,minlength[3]',
                'label' => trans('pos.user_cr_l_name'),
            ],
            [   'name' => 'email',
                'validator' => 'required,email',
                'label' => trans('pos.user_cr_email'),
            ],
            [   'name' => 'password',
                'type' => 'password',
                'validator' => 'required,minlength[6]',
                'label' => trans('pos.user_cr_pass'),
            ],
            [   'name' => 'confirm_password',
                'type' => 'password',
                'validator' => "required,minlength[6],equalTo[#password]",
                'label' => trans('pos.user_cr_confirm'),
            ],
            [   'name' => 'phone',
                'validator' => 'required,minlength[4]',
                'label' => trans('pos.phone'),
            ],
            [   'name' => 'phone_2',
                'label' => trans('pos.phone_2'),
            ],
            [   'name' => 'role_id',
                'type' => 'select',
                'validator' => 'required',
                'label' => trans('pos.user_cr_role'),
                'model' => 'roles'
            ],
            [   'name' => 'group_id',
                'type' => 'select',
                'validator' => 'required',
                'label' => trans('pos.user_cr_group'),
                'model' => 'groups'
            ],
            [   'name' => 'branch_id',
                'type' => 'select',
                'validator' => 'required',
                'label' => trans('pos.user_cr_branch'),
                'model' => 'branches'
            ]
        ];

        if(count($val) > 0) {
            array_splice($item, 4, 2, [
                [
                    'name' => 'change_pass',
                    'type' => 'switch',
                    'color' => 'red',
                    'toggle' => 'show_cp',
                    'label' => trans('pos.change_pass'),
                ],
                [   'name' => 'password',
                    'type' => 'password',
                    'validator' => 'required,minlength[6]',
                    'label' => trans('pos.user_cr_pass'),
                    'hide' => "!val['change_pass']",
                ],
                [   'name' => 'confirm_password',
                    'type' => 'password',
                    'validator' => "required,minlength[6],equalTo[#password]",
                    'label' => trans('pos.user_cr_confirm'),
                    'hide' => "!val['change_pass']",
                ],
            ]);
        }

        return [
            'settings' => VG::getSetting('users'),
            'data' => static::getFormData(),
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

    public static function getTableView() {

        return [
            [   'col' => 'id',
                'label' => trans('pos.id'),
                'select' => 'users.id',
                'width' => '50px',
            ],
            [   'col' => 'email',
                'label' => trans('pos.email'),
                'filter' => 'text',
            ],
            [   'col' => 'role_name',
                'label' => trans('pos.role_name'),
                'select' => 'roles.name',
                'search' => 'role_id',
                'filter' => 'select',
            ],
            [   'col' => 'group_name',
                'label' => trans('pos.group_name'),
                'select' => 'groups.name',
                'search' => 'group_id',
                'filter' => 'select',
            ],
            [   'col' => 'branch_name',
                'label' => trans('pos.branch_name'),
                'select' => 'branches.name',
                'search' => 'branch_id',
                'filter' => 'select',
            ],
        ];
    }

    public static function getIndexView() {

        $data = static::withTrashed()->orderBy('id','DESC')->with('role', 'group', 'branch')->get();
        foreach ($data as $key=>$rs) {
            $rs->role_name = $rs->role->name;
            if($rs->group) {
                $rs->group_name = $rs->group->name;
            } else {
                $rs->group_name = "-";
            }
            $rs->branch_name = $rs->branch->name;
        }

        return [
            'settings' => VG::getSetting('users'),
            'data' => array_merge(static::getFormData(),[
                'users' => $data
            ]),
            'views' => [
                [
                    'type' => 'genTable',
                    'fields' => static::getTableView(),
                    'data' => 'users',
                    'ajaxUrl' => 'api/table/users',
                    'serverSide' => true,
                    'createUrl' => '#/app/users/create',
                    'id' => 'dtUser', // must have and unique
                    'panel' => [
                        'label' => trans('pos.users'),
                    ],
                ]
            ]
        ];
    }
}
