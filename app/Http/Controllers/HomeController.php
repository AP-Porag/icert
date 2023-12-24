<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Carbon\Carbon;
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

        $promos = Promo::whereDate('end_date', '<', now())->where('status','=',Promo::STATUS_ACTIVE)->get();
//        $promos = Promo::where(function ($query) use ($today){
//            $query->where('end_date', '<=', $today);
//        })->get();
        if ($promos->count() > 0) {
            foreach ($promos as $promo){
                $promo->status = Promo::STATUS_EXPIRED;
                $promo->save();
            }
        }

//        return $promos;
        //temporary for fixing;
//        $altPromos = Promo::whereDate('end_date', '>', now())->where('status','=',Promo::STATUS_EXPIRED)->get();
//        if ($altPromos->count() > 0) {
//            foreach ($altPromos as $promo){
//                $promo->status = Promo::STATUS_ACTIVE;
//                $promo->save();
//            }
//        }
        return view('admin.dashboard.index');
    }
}
