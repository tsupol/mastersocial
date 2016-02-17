<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserPage;
use App\Models\Users;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session ;
use Illuminate\Http\Request;
use DB;
use Auth;
use VG;
use Input;
use Response;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {

//        define("FBAPPID", "175384656159057");
//        define("FBAPPSECRET", "2fc66c07e334dd6e1c343a0ddb47059e");

    }




    public function index()
    {
//        dd(Session::all());
        return view('main.index', ['menu' => VG::getMenu()]);
    }



    public function seed() {
//        \Iseed::generateSeed('know_reasons');
//        \Iseed::generateSeed('branches');
//        \Iseed::generateSeed('sy_auth');
//        \Iseed::generateSeed('permissions');
//        \Iseed::generateSeed('roles');
//        \Iseed::generateSeed('customer_levels');

//        \Iseed::generateSeed('tb_amphur');
//        \Iseed::generateSeed('tb_country');
//        \Iseed::generateSeed('tb_district');
//        \Iseed::generateSeed('tb_province');
//        \Iseed::generateSeed('tb_zipcode');

        \Iseed::generateSeed('category');
        \Iseed::generateSeed('facebook_chat');
        \Iseed::generateSeed('facebook_customer');
        \Iseed::generateSeed('facebook_post');
        \Iseed::generateSeed('session');
        \Iseed::generateSeed('session_tag');
        \Iseed::generateSeed('tags');
        \Iseed::generateSeed('users');
        \Iseed::generateSeed('user_page');

    }



    /**
     * Login / Logout
     */

    public function loginUser()
    {

        if(Auth::check()) {
            return redirect('main');
            // return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
        } else {
            return view('facebook.loginfacebook');
//            return view('users.login');
        }
    }

    public function LogoutUser(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }


    public function postProcess(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if (!preg_match("/@/",$username)) {
            $search_column = 'name' ;
        }else{
            $search_column = 'email' ;
        }

        if(Auth::attempt([ $search_column => $username,'password'=>$password],$request->has('remember'))){
            return redirect()->intended('main');
           // return redirect()->intended('main');
        }else{
            return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
        }
    }


//    public function postPagelist(){
//
//    }
//
//    public function postSelectpage(){
//        $data = Input::all();
//        $fb_accesstoken = $data['fb_accesstoken'];
//        $fb_id = $data['fb_id'];
//        $url =  "https://graph.facebook.com/v2.5/$fb_id/accounts?access_token=$fb_accesstoken" ;
//        $data =  @file_get_contents($url);
//        if(!$data){
//            return Redirect::back()->withErrors(['Error!!! Bad request from facebook']);
//        }
//        return view('facebook.facebookSelectPage', ['fb_accesstoken' => $fb_accesstoken ,'fb_id' => $fb_id,'fb_data' => json_decode($data) ]);
//    }

    public function postCreatepage(){
        $data = Input::all();
        $page_accessToken = $data['page_accesstoken'];
        $id = $data['id'];
        $page_id = $data['page_id'];
        $fb_id = $data['fb_id'];
        $page_name = $data['page_name'] ;
        //--- check in data base
        $chk = UserPage::where('fb_id',$fb_id)->where('page_id',$page_id)->first();
        if(empty($chk)){
            //--- receipt Long live access token
            $url = "https://graph.facebook.com/oauth/access_token?client_id=".FBAPPID."&client_secret=".FBAPPSECRET."&grant_type=fb_exchange_token&fb_exchange_token=$page_accessToken" ;
            $res =  @file_get_contents($url);
            if(!$res){
                return Redirect::back()->withErrors(['Error!!! Bad request from facebook']);
            }
            $diff_url = explode("access_token=",$res) ;
            $access = explode("&expires=",$diff_url[1]) ;
            $data['longlive_token'] = $access[0] ;
            $data['actived_at'] = Carbon::now()->format('y-m-d H:i:s');
            $status = UserPage::create($data);
            Session::set('fb_uid',$status->fb_id );
            Session::set('fb_page_id',$status->page_id );
            Session::set('fb_page_name',$status->page_name );
            Session::set('fb_longlive_token',$status->longlive_token );
            if($status === NULL) {
                return Redirect::back()->withErrors(['Error!!! Could not connect server']);
            }
        }else{
            Session::set('fb_uid',$chk->fb_id );
            Session::set('fb_longlive_token',$chk->longlive_token );
            Session::set('fb_page_id',$chk->page_id );
            Session::set('fb_page_name',$chk->page_name );
            $data['actived_at'] = Carbon::now()->format('Y-m-d H:i:s');
            unset($data['_token']);
            unset($data['fb_accesstoken']);
            unset($data['page_accesstoken']);
            $data['actived_at'] = Carbon::now()->format('y-m-d H:i:s');
            UserPage::where('fb_id',$fb_id)->where('page_id',$page_id)->update($data);
        }
        return redirect()->intended('main');
    }

    public function postProcessfb(){
        $data = Input::all();
        $fb_accesstoken = $data['fb_accesstoken'];
        $fb_id = $data['fb_id'];

        $url = "https://graph.facebook.com/v2.5/$fb_id?fields=email,name,accounts&access_token=$fb_accesstoken" ;
        $data =  @file_get_contents($url);
        if(!$data){
            return Redirect::back()->withErrors(['Error!!! Bad request from facebook']);
        }
        $data = json_decode($data,true) ;

        $chk = Users::where('fb_id',$fb_id)->first();
        if(empty($chk)){
            $data = array_diff_key($data, array_flip(['id','_method','deleted_at','deleted_by','updated_at','created_at']));
            $data['fb_id'] = $fb_id ;
            $data['created_by'] = "System";
            $status = Users::create($data);
            if($status === NULL) {
                return Redirect::back()->withErrors(['Error!!! Could not connect server']);
            }
            $user_id = $status->id ;
        }else{
            $user_id = $chk->id ;
        }
        Session::set('fb_name',$data['name']);
        $json = $data['accounts'] ;
//        dd($json);
        return view('facebook.facebookSelectPage', ['fb_accesstoken' => $fb_accesstoken ,'fb_id' => $fb_id,'id'=>$user_id,'fb_data' => $json ]);

    }

    public function postfileupload(){
//        dd('in file uplaod');
       // $input = Input::file('File');


        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $file      = Input::file('file');
//        $albumID   = Input::get('albumID');

        if($file) {

//            $destinationPath = public_path() . '/uploads/' . $albumID ;
            $path = '/uploads/'.date("Ym") ;
            $destinationPath = public_path().$path;
            $filename = time().'_'.$file->getClientOriginalName();

            $upload_success = Input::file('file')->move($destinationPath, $filename);

            $img_url = $path.$filename ;

            if ($upload_success) {

                // resizing an uploaded file
//                Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);

                return Response::json(['img_url' => $img_url], 200);
            } else {
                return Response::json('error', 400);
            }
        }

    }


    public function carbon() {
            $dt = Carbon::parse('2016-01-12 23:26:11.123789');

    // These getters specifically return integers, ie intval()
            var_dump($dt->year);                                         // int(2012)
            var_dump($dt->month);                                        // int(9)
            var_dump($dt->day);                                          // int(5)
            var_dump($dt->hour);                                         // int(23)
            var_dump($dt->minute);                                       // int(26)
            var_dump($dt->second);                                       // int(11)
            var_dump($dt->micro);                                        // int(123789)
            echo "<BR>Day of week : " ;
            var_dump($dt->dayOfWeek); echo "<BR>" ;                                    // int(3)
            var_dump($dt->dayOfYear);                                    // int(248)
            var_dump($dt->weekOfMonth);                                  // int(1)
            var_dump($dt->weekOfYear);                                   // int(36)
            var_dump($dt->daysInMonth);                                  // int(30)
            var_dump($dt->timestamp);                                    // int(1346901971)
            var_dump(Carbon::createFromDate(1975, 5, 21)->age);          // int(40) calculated vs now in the same tz
            var_dump($dt->quarter);                                      // int(3)

    // Returns an int of seconds difference from UTC (+/- sign included)
            var_dump(Carbon::createFromTimestampUTC(0)->offset);         // int(0)
            var_dump(Carbon::createFromTimestamp(0)->offset);            // int(-18000)

    // Returns an int of hours difference from UTC (+/- sign included)
            var_dump(Carbon::createFromTimestamp(0)->offsetHours);       // int(-5)

    // Indicates if day light savings time is on
            var_dump(Carbon::createFromDate(2012, 1, 1)->dst);           // bool(false)
            var_dump(Carbon::createFromDate(2012, 9, 1)->dst);           // bool(true)

    // Indicates if the instance is in the same timezone as the local timezone
            var_dump(Carbon::now()->local);                              // bool(true)
            var_dump(Carbon::now('America/Vancouver')->local);           // bool(false)

    // Indicates if the instance is in the UTC timezone
            var_dump(Carbon::now()->utc);                                // bool(false)
            var_dump(Carbon::now('Europe/London')->utc);                 // bool(true)
            var_dump(Carbon::createFromTimestampUTC(0)->utc);            // bool(true)

    // Gets the DateTimeZone instance
            echo get_class(Carbon::now()->timezone);                     // DateTimeZone
            echo get_class(Carbon::now()->tz);                           // DateTimeZone

    // Gets the DateTimeZone instance name, shortcut for ->timezone->getName()
            echo Carbon::now()->timezoneName;                            // America/Toronto
            echo Carbon::now()->tzName;
    }

    public function test(){
        $id= 1 ;
        while ($id<4) {
            foreach (array('1', '2', '3') as $a) {
                echo "$a";
                foreach (array('a', 'b', 'c') as $b) {
                    echo "$b";
                    if ($a == '1' && $b == 'b') {

                        if ($id == 1) {
                            break;  // this will break $b foreach loops
                        }


                    }
                    if ($a == '2' && $b == 'b') {
                        break 2;  // this will break both foreach loops
                    }
                }
                echo "<BR>";
            }
            $id++;
        }
        echo ".";
    }


}