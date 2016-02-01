<?php namespace App\Http\Controllers;

use App\Http\Requests;
use VG;
use Session;
use Auth;
use Input;
use Image;
use Response;

class SystemController extends Controller {

    public function getLang($lang) {
        $user = Auth::user();
        $user->lang = $lang;
        $user->save();
        Session::set('locale', $lang);
        app()->setLocale($lang);
        return redirect('main#'.Input::get('url'));
    }

    public function postUpload() {
//        dd(Input::all());
        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $file      = Input::file('file');
//        $albumID   = Input::get('albumID');

        if($file) {

//            $destinationPath = public_path() . '/uploads/' . $albumID ;
            $destinationPath = public_path() . '/uploads';
            $filename = $file->getClientOriginalName();

            $upload_success = Input::file('file')->move($destinationPath, $filename);

            if ($upload_success) {

                // resizing an uploaded file
//                Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);

                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);
            }
        }
    }

}
