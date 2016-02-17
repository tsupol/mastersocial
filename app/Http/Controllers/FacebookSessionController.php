<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Facebook;
use App\Models\FacebookCase;
use App\Models\FacebookChat;
use App\Models\FacebookChatClose;
use App\Models\FacebookCustomer;
use App\Models\UserPage;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use VG;
use Input;
use Session;


class FacebookChatCloseController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        return FacebookChatClose::getIndexView();

    }

    public function create()
    {
        return Facebook::getCreateView();
    }

    public function store()
    {
        $data = Input::all();

        $post_type = '';
        if (!empty($data['hasphotos'])) {
            $post_type = 'photos';
            $data["post_id"] = Session::get('fb_page_id') . "_" . $data["post_id"];
        } else if (!empty($data['link'])) {
            $post_type = 'link';
        } else if (!empty($data['message'])) {
            $post_type = 'message';
        }
        $chk = Facebook::where('post_id', $data["post_id"])->first();
        if (isset($chk)) {
            return VG::result(false, 'failed! this post has repeat');
        }
        $data = array_diff_key($data, array_flip(['id', '_method', 'deleted_at', 'deleted_by', 'updated_at', 'created_at']));
        $data["created_by"] = 'SYSTEM';
        $data['post_type'] = $post_type;

        $status = Facebook::create($data);

        if ($status === NULL) {
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
        $data = array_diff_key($data, array_flip(['id', 'confirm_password', '_method', 'deleted_at', 'deleted_by', 'updated_at', 'created_at']));

        if (isset($data["change_pass"]) && $data["change_pass"] == true) {
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
        if ($status == 1) {
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
        } else {
            $user->delete();
            return VG::result(true, ['action' => 'delete', 'id' => $id]);
        }
    }


}