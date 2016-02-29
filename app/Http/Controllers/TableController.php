<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Facebook;
use App\Models\FacebookCustomer;
use App\Models\FacebookSession;
use App\Models\Pattern;
use App\Models\Tag;
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

    public function getTags()
    {
        $view = Tag::getTableView();
        $cols = ['tags.deleted_at', 'tags.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }
        if (VG::getPermission('category.edit')) {
            $data = Tag::withTrashed()->select($cols)->orderBy('tags.id', 'DESC')->get();
        } else {
            $data = Tag::select($cols)->orderBy('tags.id', 'DESC')->get();
        }
        return ['data' => VG::dataArray($data, $view, 'facebooks/tags', 'tags')];
    }



    public function getFacebooksSession()
    {
        $view = FacebookSession::getTableView();
       // $cols = ['session.deleted_at', 'session.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }


//dd($cols) ;

        unset($cols[1]);  //--- from_name
        unset($cols[5]);  //--- tags

        $cols[6] = "tid" ;


       // array_push($cols,DB::RAW('DISTINCT(tid)')) ;

        if (VG::getPermission('session.edit')) {
            $data = FacebookSession::withTrashed()->select($cols,'123')->with('tags')->orderBy('session.id', 'DESC')->get();
        } else {
            $data = FacebookSession::select($cols)->groupby('tid')->distinct()->with('tags')->orderBy('session.id', 'DESC')->get();
        }



        foreach ($data as $d){
            $d->from_name  = FacebookCustomer::where('tid',$d->tid)->first()->from_name;
        }



       // dd('test');

        return ['data' => VG::dataArray($data, $view, 'facebooks/session', 'inbox',['edit' => false , 'delete' => false , 'custom' => [ '#/app/facebooks/session/edit/' , 'list view' , 'preview Open/Close status this customer' ,'tid'  ] ])];
    }


    public function getFbSessionList($id)
    {
//        dd($id);
        $view = FacebookSession::getTableListView();
        // $cols = ['session.deleted_at', 'session.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }
        unset($cols[5]);  //--- tags

        if (VG::getPermission('session.edit')) {
            $data = FacebookSession::where('tid',$id)->withTrashed()->select($cols)->with('tags')->orderBy('session.id', 'DESC')->get();
        } else {
            $data = FacebookSession::where('tid',$id)->select($cols)->with('tags')->orderBy('session.id', 'DESC')->get();
        }

        foreach ($data as $d){
            $d->status_id  =  ($d->status_id==1) ? "Open" :  (( $d->status_id==2) ?  "Close" : "Pendding"  ) ;
        }

        return ['data' => VG::dataArray($data, $view, 'facebooks/session', 'inbox' ,[ 'edit' => false , 'delete' => false , 'custom' => [ '#/app/facebooks/session/chat/' , 'Chat Log' , 'preview Chat Log From this Status' ,'id'  ]  ] ) ];
    }

    public function getPatterns()
    {
        $view = Pattern::getTableView();
        $cols = ['patterns.deleted_at', 'patterns.id'];
        foreach ($view as $v) {
            if (!empty($v['select'])) $cols[] = $v['select'] . ' as ' . $v['col'];
            else $cols[] = $v['col'];
        }

        if (VG::getPermission('patterns.edit')) {
            $data = Pattern::withTrashed()->select($cols)->orderBy('patterns.id', 'DESC')->get();
        } else {
            $data = Pattern::select($cols)->orderBy('patterns.id', 'DESC')->get();
        }
        return ['data' => VG::dataArray($data, $view, 'facebooks/patterns', 'patterns')];
    }


}
