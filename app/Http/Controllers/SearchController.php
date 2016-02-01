<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\Branch;

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


}
