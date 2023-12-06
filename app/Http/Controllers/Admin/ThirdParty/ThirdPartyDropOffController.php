<?php

namespace App\Http\Controllers\Admin\ThirdParty;

use App\DataTables\ThirdPartyDropOffDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ThirdParty;
use App\Models\ThirdPartyProduct;
use App\Services\ThirdPartyDropOffService;
use Illuminate\Http\Request;

class ThirdPartyDropOffController extends Controller
{
    protected $thirdPartyDropOffService;

    public function __construct(ThirdPartyDropOffService $thirdPartyDropOffService)
    {
        $this->thirdPartyDropOffService = $thirdPartyDropOffService;
    }

    public function index(ThirdPartyDropOffDataTable $dataTable)
    {
        set_page_meta('Third Party Drop Off');
        return $dataTable->render('admin.third_party.third_party_drop_off.index');
    }

    public function create()
    {
        set_page_meta('Create Third Party Drop Off Center');
        $products = Product::orderBy('id','ASC')->get();
        return view('admin.third_party.third_party_drop_off.create',compact('products'));
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();
//            dd($data);
            $thirdParty = $this->thirdPartyDropOffService->storeOrUpdate($data, null);

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
            set_page_meta('Edit Third Party Drop Off Center');
            $item = $this->thirdPartyDropOffService->get($id,['products']);
            $products = Product::orderBy('id','ASC')->get();
            return view('admin.third_party.third_party_drop_off.edit', compact('item','products'));
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
            $thirdParty = $this->thirdPartyDropOffService->storeOrUpdate($data, $id);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $orderOfThisThirdParty = Order::where('third_party_id',$id)->count();

            if ($orderOfThisThirdParty > 0){
                something_wrong_flash("There is some order with this Third Party, So not possible to delete this!");
            }else{
                $this->thirdPartyDropOffService->delete($id);
                record_deleted_flash();
            }

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
}
