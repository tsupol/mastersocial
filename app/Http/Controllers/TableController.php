<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Facebook;
use App\User;
use App\ViewGenerator\ViewGeneratorManager as VG;
use Input;
use DB;

class TableController extends Controller
{



    public function getUsers()
    {

        $view = User::getTableView();
        $cols = ['users.deleted_at'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }

        if (VG::getPermission('users.edit')) {
            $sql = User::withTrashed()->select($cols);
        } else {
            $sql = User::select($cols);
        }
        $sql->join('roles', 'roles.id', '=', 'users.role_id')
            ->join('groups', 'groups.id', '=', 'users.group_id')
            ->join('branches', 'branches.id', '=', 'users.branch_id');

        // -- Order

        foreach (Input::get('order') as $order) {
            $column = $order['column'];
            if (empty($view[$column]['select']))
                $sql->orderBy($view[$column]['col'], $order['dir']);
            else
                $sql->orderBy($view[$column]['select'], $order['dir']);
        }

        // -- Filter

        foreach (Input::get('columns') as $col) {
            $column = $col['data'];
            $val = $col['search']['value'];
            if ($val != '') {
//                $col = $view[$column];
                $col = (isset($view[$column]['search'])) ? $view[$column]['search'] : $view[$column]['col'];
                if ($view[$column]['filter'] == 'text') {
                    $sql->where($col, 'LIKE', '%' . $val . '%');
                } else if ($view[$column]['filter'] == 'select') {
                    $sql->where($col, '=', $val);
                }
            }
        }

        $count = $sql->count();
        $data = $sql->skip(Input::get('start'))->take(Input::get('length'))->get();

        $result = [
            'draw' => Input::get('draw'),
            'aaData' => VG::dataArray($data, $view, 'users', 'users'),
            'recordsFiltered' => $count,
            'recordsTotal' => User::count(),
            'yadcf_data_2' => Role::select('id as value', 'name as label')->get(),
            'yadcf_data_3' => Group::select('id as value', 'name as label')->get(),
            'yadcf_data_4' => Branch::select('id as value', 'name as label')->get(),
        ];

        return $result;
    }

    public function getCategorys()
    {
        $view = Category::getTableView();
        $cols = ['category.deleted_at', 'category.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }
        if (VG::getPermission('category.edit')) {
            $data = Category::withTrashed()->select($cols)->orderBy('category.id', 'DESC')->get();
        } else {
            $data = Category::select($cols)->orderBy('category.id', 'DESC')->get();
        }


        return ['data' => VG::dataArray($data, $view, 'facebooks/categorys', 'categorys')];
    }

    public function getFacebooks()
    {
        $view = Facebook::getTableView();
        $cols = ['facebook_post.deleted_at', 'facebook_post.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }
        if (VG::getPermission('facebook_post.edit')) {
            $data = Facebook::withTrashed()->select($cols)->orderBy('facebook_post.id', 'DESC')->get();
        } else {
            $data = Facebook::select($cols)->orderBy('facebook_post.id', 'DESC')->get();
        }

        //dd($data);

        return ['data' => VG::dataArray($data, $view, 'facebooks/inbox', 'inbox')];
    }






}
