<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session ;
use Illuminate\Http\Request;
use DB;
use Auth;
use VG;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

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

//        \Iseed::generateSeed('users');
//
//        \Iseed::generateSeed('purchases');
//        \Iseed::generateSeed('receipts');
//        \Iseed::generateSeed('purchase_package');
//        \Iseed::generateSeed('purchase_product');

//        \Iseed::generateSeed('customers');
//        \Iseed::generateSeed('perm_role');
//        \Iseed::generateSeed('customer_branch');
        \Iseed::generateSeed('bills');
        \Iseed::generateSeed('bill_procedure');
        \Iseed::generateSeed('bill_item');
        \Iseed::generateSeed('bill_product');

//        \Iseed::generateSeed('customers');
//        \Iseed::generateSeed('packages');
//        \Iseed::generateSeed('package_types');
//        \Iseed::generateSeed('package_procedure');
//        \Iseed::generateSeed('package_product');
//        \Iseed::generateSeed('procedures');
//        \Iseed::generateSeed('procedure_item');
//        \Iseed::generateSeed('procedure_product');
//        \Iseed::generateSeed('products');
//        \Iseed::generateSeed('items');

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
            return view('users.login');
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




}