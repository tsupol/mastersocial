<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\Branch;

use App\Models\Pattern;
use App\Models\Tag;
use App\User;
use Illuminate\Support\Facades\DB;
use VG;
use Input;

class SearchController extends Controller {

    // -- Select2


    public function getBranches()
    {
        if(Input::has('id')) {
            $data = Branch::whereId(Input::get('id'))->take(1)->get();
        } else {
            $txt = addslashes(Input::get('q'));
            $data = Branch::where('name', 'LIKE', '%'.$txt.'%')->take(10)->get();
        }

        foreach($data as $rs) {
            $rs->value = $rs->name;
        }

        return $data;
    }


    public function getTags()
    {
        if(Input::has('id')) {
            $data = Tag::whereId(Input::get('id'))->take(1)->get();
        } else {
            $txt = addslashes(Input::get('q'));
            $data = Tag::where('name', 'LIKE', '%'.$txt.'%')->take(10)->get();
        }
        return $data;
    }
    public function postPatterns()
    {

        $data = Input::all();

        $txt = $data['stext'] ;

        if(Input::has('id')) {
            $data = Pattern::whereId(Input::get('id'))->take(1)->get();
        } else {
            $data = Pattern::where('name', 'LIKE', '%'.$txt.'%')->take(25)->get();
        }
        return $data;
    }


}
