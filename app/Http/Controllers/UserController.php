<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Customer;
use App\User;
use Carbon\Carbon;
use VG;
use Input;
use Session;


class UserController extends Controller
{

    public function index()
    {
//        $data = User::withTrashed()->orderBy('id','DESC')->with('role', 'group', 'branch')->paginate(10);

        return User::getIndexView();

//        return json_encode(VG::getTableSchema($data, 'users.index'));
    }

    public function create()
    {
        return User::getCreateView();
    }

    public function store()
    {
        $data = Input::all();

        if ($data["password"] != $data["confirm_password"] ){
            return VG::result(false, 'failed!');
        }

        $chk = User::where('email', $data["email"])->first();
        if(isset($chk)){
            return VG::result(false, 'failed!'); //--- check email ���
        }


        $data["password"] = bcrypt($data["password"]) ;

        $data = array_diff_key($data, array_flip(['id','_method','deleted_at','deleted_by','updated_at','created_at']));
        $data["created_by"] = Session::get('user_id');
        $status = User::create($data);

        if($status === NULL) {
            return VG::result(false, 'failed!');
        }
        return VG::result(true, ['action' => 'create', 'id' => $status->id]);

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        $user->password = '';
        return User::getCreateView($user);
    }

    public function update($id)
    {
        $data = Input::all();
        $data = array_diff_key($data, array_flip(['id','confirm_password', '_method','deleted_at','deleted_by','updated_at','created_at']));

        if(isset($data["change_pass"]) && $data["change_pass"] == true) {
            if (!empty($data["password"])) {
                $data["password"] = \Hash::make($data["password"]);
            } else {
                unset($data["password"]);
            }
        } else {
            unset($data["password"]);
        }
        unset($data["change_pass"]);

        $data["updated_by"] = Session::get('user_id');
        $status = User::whereId($id)->update($data);
        if($status == 1) {
            return VG::result(true, ['action' => 'update', 'id' => $id]);
        }
        return VG::result(false, 'failed!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            User::withTrashed()->whereId($id)->first()->restore();
            return VG::result(true, ['action' => 'restore', 'id' => $id]);
        }else{
            $user->delete();
            return VG::result(true, ['action' => 'delete', 'id' => $id]);
        }
    }

    public function duplicate($id)
    {
        $user = User::find($id);
        if(is_null($user)) return VG::result(false, trans('error.not_found', ['id', $id]));
        try {
            $copy = $user->replicate();
            $email = 'copy_'.$copy->email;
            while(User::whereEmail($email)->count() > 0) {
                $email = 'copy_'.$email;
            }
            $copy->email = $email;
            $copy->save();
        } catch(\Illuminate\Database\QueryException $e) {
            return VG::result(false, $e->errorInfo);
        }
        return VG::result(true, ['redirect' => '/app/users']);
    }

}