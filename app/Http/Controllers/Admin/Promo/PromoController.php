<?php

namespace App\Http\Controllers\Admin\Promo;

use App\DataTables\PromoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromoRequest;
use App\Models\Customer;
use App\Models\Promo;
use App\Services\PromoService;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    protected $promoService;

    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }

    public function index(PromoDataTable $dataTable)
    {
        set_page_meta('Promo Code');
        return $dataTable->render('admin.promos.index');
    }

    public function create()
    {
        set_page_meta('Create Promo Code');

        $customers = Customer::orderBy('id','ASC')->get();
        return view('admin.promos.create',compact('customers'));
    }

    public function store(PromoRequest $request)
    {

        try {
            $data = $request->validated();

//            if ($request->has('no_end_date') && $data['no_end_date'] == 'on'){
//                $data['end_date'] = "2099-12-31";
////            $date = strtotime('2099-12-31');
////            $data['end_date'] = date('Y-m-d',$date);;
//            }else{
//                $data['end_date'] = $request->end_date;
//            }
//        dd($data['end_date']);
            $data['priority']= Promo::PRIORITY_NORMAL;
            $data['is_select_customer']= false;
            $data['status']= Promo::STATUS_ACTIVE;


            $promo = $this->promoService->storeOrUpdate($data, null);
            record_created_flash();
            return redirect()->route('admin.promos.index');
        } catch (\Exception $e) {
        }
        return back();
    }

    public function show($id)
    {
        set_page_meta('View Promo Code');
        $item = $this->promoService->get($id);
        return view('admin.promos.show', compact('item'));
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Promo Code');
            $item = $this->promoService->get($id);
            $customers = Customer::orderBy('id','ASC')->get();
            return view('admin.promos.edit', compact('item','customers'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(PromoRequest $request, $id)
    {
        $data = $request->validated();

        try {

            $promo =  $this->promoService->storeOrUpdate($data, $id);

            record_updated_flash();
            return redirect()->route('admin.promos.index');
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->promoService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function makeSPC($id)
    {

        $promo = Promo::find($id);
        $promo->priority = Promo::PRIORITY_SPECIAL;
        $promo->save();

        return back();
    }
}
