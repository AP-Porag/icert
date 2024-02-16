<?php

namespace App\Http\Controllers\Admin\Entry;

use App\DataTables\EntryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Entry;
use App\Models\Product;
use App\Models\Promo;
use App\Models\ThirdParty;
use App\Services\EntryService;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    protected $entryService;

    public function __construct(EntryService $entryService)
    {
        $this->entryService = $entryService;
    }

    public function index(EntryDataTable $dataTable)
    {
        set_page_meta('Entry');
        return $dataTable->render('admin.entry.index');
    }

    public function create()
    {
        set_page_meta('Create Entry');
        $products = Product::orderBy('id','ASC')->get();
        $allCustomers = Customer::orderBy('id','DESC')->select('id','name')->get();
        $allPromos = Promo::orderBy('id','DESC')->select('id','name')->get();
        $allThirdParties = ThirdParty::orderBy('id','DESC')->select('id','name')->get();

//        return $allThirdParties;
        return view('admin.entry.create',compact('products','allCustomers','allPromos','allThirdParties'));
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();
//            dd($data);
            $thirdParty = $this->entryService->storeOrUpdate($data, null);

            if ($thirdParty){

                foreach ($data['products'] as $product){
                    $thirdPartyProduct = ThirdPartyProduct::create([
                        "third_party_id"=>$thirdParty->id,
                        "product_id"=>$product,
                    ]);
                }
            }
            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {

        try {
            set_page_meta('Edit Entry');
            $item = $this->entryService->get($id,['products']);
            $products = Product::orderBy('id','ASC')->get();
            return view('admin.entry.edit', compact('item','products'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(Request $request, $id)
    {
//        $data = $request->all();
//        dd($data);
        try {

            $data = $request->all();
            $thirdParty = $this->entryService->storeOrUpdate($data, $id);

            if ($thirdParty){
                $ThirdPartyProducts = ThirdPartyProduct::where('third_party_id',$id)->get();

                foreach ($ThirdPartyProducts as $thirdPartyProduct){
                    $thirdPartyProduct->delete();
                }

                foreach ($data['products'] as $product){
                    $thirdPartyProduct = ThirdPartyProduct::create([
                        "third_party_id"=>$id,
                        "product_id"=>$product,
                    ]);
                }
            }

            record_updated_flash();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function show($id)
    {
        set_page_meta('Show Entry');
        $item = Entry::find($id);

        return view('admin.entry.show',compact('item'));
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
//            $orderOfThisThirdParty = Order::where('third_party_id',$id)->count();
//
//            if ($orderOfThisThirdParty > 0){
//                something_wrong_flash("There is some order with this Third Party, So not possible to delete this!");
//            }else{
//                $this->thirdPartyDropOffService->delete($id);
//                record_deleted_flash();
//            }

            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function findIfExists(Request $request)
    {
//        dd($request->all());

        $thirdParty = ThirdParty::where('name',$request->name)->with('products')->first();

        if ($thirdParty != null){
            $data = ['status'=>200,'message'=>'Already Exist','data'=>$thirdParty];
            return response()->json($data);
        }else{
            $data = ['status'=>300,'message'=>'Not Exist','data'=>$thirdParty];
            return response()->json($data);
        }
    }

    public function getCustomerInfo($id)
    {
        $customer = Customer::find($id);
        $data = [
            'status'=>200,
            'message'=>'Successfully fetched',
            'data'=>$customer
        ];
        return response()->json($data);
    }
}
