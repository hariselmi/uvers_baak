<?php namespace App\Http\Controllers;

use App\Item, App\Customer, App\Sale;
use App\Supplier, App\Receiving, App\User;
use App;
use App\Account;
use App\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
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
    
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        
        $articles_utama = DB::table('articles')
                    ->select('*')
                    ->where('category','1')
                    ->where('dlt','0')
                    ->orderBy('id', 'desc')
                    ->get();

                                    

        return view('landing.landing', compact('articles_utama'));

    }

    public function articles_details($id)
    {
        //



        $articles = DB::table('articles')
                    ->select('*')
                    ->where('id',$id)
                    ->first();


        $recent_posts = DB::table('articles')
                    ->select('*')
                    ->where('category', $articles->category)
                    ->where('id', '!=', $id)
                    ->orderBy('id', 'desc')
                    ->limit('10')
                    ->get();

        return view('landing.articles_details', compact('articles','recent_posts'));

    }

    public function informasi_kemahasiswaan()
    {

        $articles_kemahasiswaan = DB::table('articles')
                    ->select('*')
                    ->where('category','2')
                    ->where('dlt','0')
                    ->orderBy('id', 'desc')
                    ->get();
                    
        return view('landing.informasi_kemahasiswaan', compact('articles_kemahasiswaan'));
    }
    public function kegiatan_kemahasiswaan()
    {

        $articles_kegiatan = DB::table('articles')
                    ->select('*')
                    ->where('category','3')
                    ->where('dlt','0')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('landing.kegiatan_kemahasiswaan', compact('articles_kegiatan'));
    }
    public function informasi_beasiswa()
    {

        $articles_beasiswa = DB::table('articles')
                    ->select('*')
                    ->where('category','4')
                    ->where('dlt','0')
                    ->orderBy('id', 'desc')
                    ->get();
        return view('landing.informasi_beasiswa', compact('articles_beasiswa'));
    }


}
