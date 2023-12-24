<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        set_page_meta('Dashboard');

        //changing promo code status
        $today = date('Y-m-d');


        $promos = Promo::where('end_date', '<', $today)->where('status','=',Promo::STATUS_ACTIVE)->get();
        if ($promos->count() > 0) {
            foreach ($promos as $promo){
                $promo->status = Promo::STATUS_EXPIRED;
                $promo->save();
            }
        }

        //temporary for fixing;
//        $altPromos = Promo::where('end_date', '>', $today)->where('status','=',Promo::STATUS_EXPIRED)->get();
//        if ($altPromos->count() > 0) {
//            foreach ($altPromos as $promo){
//                $promo->status = Promo::STATUS_ACTIVE;
//                $promo->save();
//            }
//        }
        return view('admin.dashboard.index');
    }
}
