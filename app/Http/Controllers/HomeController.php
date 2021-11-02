<?php namespace App\Http\Controllers;

use App\Item, App\Customer, App\Sale;
use App\Supplier, App\Receiving, App\User;
use App;
use Auth;
use App\Account;
use App\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        
        return view('home')->with([
            'pending'=>0,
            'process'=>0,
            'complete'=>0,
            'cancel'=>0,
            
        ]);
    }

    public function setRole(Request $request, $id){
        $request->session()->put('role', $id);

        return redirect()->back();
    }


    
    public function period_filter(Request $request){

        $period_id = $request->period_id;

        $pending = DB::table('schedules')->where([['dlt', '0'], ['status', 1], ['period_id', $period_id]])->count();
        $process = DB::table('schedules')->where([['dlt', '0'], ['status', 2], ['period_id', $period_id]])->count();
        $complete = DB::table('schedules')->where([['dlt', '0'], ['status', 3], ['period_id', $period_id]])->count();
        $cancel = DB::table('schedules')->where([['dlt', '0'], ['status', 4], ['period_id', $period_id]])->count();


        $data['period_id']  = $period_id;
        $data['pending']    = $pending;
        $data['process']    = $process;
        $data['complete']   = $complete;
        $data['cancel']     = $cancel;

        return $data;

    }

    public function kegiatan(Request $request){
        $query = $request->get('query');
        $filterResult = DB::table('aktivitas')->where('nama_kegiatan', 'LIKE', '%'. $query. '%')->pluck('nama_kegiatan');
        return response()->json($filterResult);
     }
}
