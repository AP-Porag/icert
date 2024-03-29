<?php

namespace App\Http\Controllers\Admin\Promo;

use App\DataTables\SpecialPromoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdditionalCustomerRequest;
use App\Http\Requests\PromoRequest;
use App\Http\Requests\SpecilPromoRequest;
use App\Models\Customer;
use App\Models\CustomerPromo;
use App\Models\Promo;
use App\Services\PromoService;
use Illuminate\Http\Request;

class SpecialPromoController extends Controller
{
    protected $promoService;

    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }

    public function index(SpecialPromoDataTable $dataTable)
    {
        set_page_meta('Special Promo Code');
        return $dataTable->render('admin.promos.special_promos.index');
    }

    public function create()
    {
        set_page_meta('Create Special Promo Code');

        $customers = Customer::orderBy('id','ASC')->get();
        return view('admin.promos.special_promos.create',compact('customers'));
    }

    public function store(SpecilPromoRequest $request)
    {

        try {
            $data = $request->validated();
            $data['priority']= Promo::PRIORITY_SPECIAL;
            $data['is_select_customer']= true;
            $data['status']= Promo::STATUS_ACTIVE;
            $promo = $this->promoService->storeOrUpdate($data, null);

            if ($promo){
                foreach ($data['customers'] as $customer){
                    $customerPromo = CustomerPromo::create([
                        'customer_id'=>$customer,
                        'promo_id'=>$promo->id
                    ]);
                }
            }

            record_created_flash();
            return response(['status' => 200,'message'=>'Created successfully']);
//            return redirect()->route('admin.slpromos.index');
        } catch (\Exception $e) {
            return response(['status' => 500,'message'=>'Server Error!']);
        }
        return back();
    }

    public function show($id)
    {
        set_page_meta('View Special Promo Code');
        $item = $this->promoService->get($id);
        return view('admin.promos.special_promos.show', compact('item'));
    }
    public function edit($id)
    {
        try {
            set_page_meta('Edit Special Promo Code');
            $item = $this->promoService->get($id);
            $customers = Customer::orderBy('id','ASC')->get();
            return view('admin.promos.special_promos.edit', compact('item','customers'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(SpecilPromoRequest $request, $id)
    {
        $data = $request->validated();

        try {

            $promo =  $this->promoService->storeOrUpdate($data, $id);

            if ($promo){
                $customerPromos = CustomerPromo::where('promo_id',$id)->get();

                foreach ($customerPromos as $customerPromo){
                    $customerPromo->delete();
                }

                foreach ($data['customers'] as $customer){
                    $customerPromo = CustomerPromo::create([
                        'customer_id'=>$customer,
                        'promo_id'=>$id
                    ]);
                }
            }

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

    public function makeNPC($id)
    {

        $promo = Promo::find($id);
        $promo->priority = Promo::PRIORITY_NORMAL;
        $promo->save();

        return back();
    }

    public function attachAditionalCustomer($id)
    {
        set_page_meta('Attach Additional');
        $item = $this->promoService->get($id);
        $customers = Customer::orderBy('id','ASC')->get();
        return view('admin.promos.special_promos.additional', compact('item','customers'));
    }

    public function saveAditionalCustomer(AdditionalCustomerRequest $request)
    {

        try {
            $data = $request->validated();
            if ($data['promo_id']){
                foreach ($data['customers'] as $customer){
                    $customerPromo = CustomerPromo::create([
                        'customer_id'=>$customer,
                        'promo_id'=>$data['promo_id']
                    ]);
                }
            }

            record_created_flash();
            return redirect()->route('admin.slpromos.show',$data['promo_id']);
        } catch (\Exception $e) {
            something_wrong_flash();
            return redirect()->route('admin.slpromos.show',$data['promo_id']);
        }
        return redirect()->route('admin.slpromos.show',$data['promo_id']);
    }
}
