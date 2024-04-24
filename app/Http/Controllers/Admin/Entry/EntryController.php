<?php

namespace App\Http\Controllers\Admin\Entry;

use App\DataTables\EntryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Authenticator;
use App\Models\Customer;
use App\Models\Entry;
use App\Models\EntryItems;
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
        $allAuthenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();

//        return $allThirdParties;
        return view('admin.entry.create',compact('products','allCustomers','allPromos','allThirdParties','allAuthenticators'));
    }

    public function store(Request $request)
    {

        try {

            $entryData = $request->all();
            $data = [
                "customer_id"=>$entryData['customerId'],
                'entrySKU'=>'ic20023645',
                'customer_name'=>$entryData['name'],
                'item_qty'=>$entryData['item_qty'],
                'billing_address_line_one'=>$entryData['billing_address_line_one'],
                'billing_address_line_two'=>$entryData['billing_address_line_two'],
                'billing_country'=>$entryData['billing_country'],
                'billing_province'=>$entryData['billing_province'],
                'billing_city'=>$entryData['billing_city'],
                'billing_postal'=>$entryData['billing_postal'],
                'billing_phone'=>$entryData['billing_phone'],
                'same_as_billing'=>$entryData['same_as_billing'],
                'autographed'=>$entryData['autographed'],
                'shipping_name'=>$entryData['shipping_name'],
                'shipping_company_name'=>$entryData['shipping_company_name'],
                'shipping_address_line_one'=>$entryData['shipping_address_line_one'],
                'shipping_address_line_two'=>$entryData['shipping_address_line_two'],
                'shipping_country'=>$entryData['shipping_country'],
                'shipping_province'=>$entryData['shipping_province'],
                'shipping_city'=>$entryData['shipping_city'],
                'shipping_postal'=>$entryData['shipping_postal'],
                'shipping_phone'=>$entryData['shipping_postal'],
                'submission_date'=>$entryData['submission_date'],
                'grading_location'=>$entryData['grading_location'],
                'promo_code'=>$entryData['promo_code'],
                'payment_made'=>$entryData['payment_made'],
                'pay_on_pickup'=>$entryData['pay_on_pickup'],
                'cod'=>$entryData['cod'],
                'shopify_order_number'=>$entryData['shopify_order_number'],
                'shipping_method'=>$entryData['shipping_method'],
                'pickup_location'=>$entryData['pickup_location'],
                'show_pickup_location'=>$entryData['show_pickup_location'],
                'third_party_drop_center'=>$entryData['third_party_drop_center'],
                'use_customer_account'=>$entryData['use_customer_account'],
                'customer_account_number'=>$entryData['customer_account_number'],
            ];

            $entry = $this->entryService->storeOrUpdate($data, null);

            $entryData = [
                'entry_id'=>$entry->id,
                'itemType'=>$entryData['itemType'],
                //item type card
                'card_description_one'=>$entryData['card_description_one'],
                'card_description_two'=>$entryData['card_description_two'],
                'card_description_three'=>$entryData['card_description_three'],
                'card_serial_number'=>$entryData['card_serial_number'],
                'card_autographed'=>$entryData['card_autographed'],
                'card_authenticator_name'=>$entryData['card_authenticator_name'],
                'card_authenticator_cert_no'=>$entryData['card_authenticator_cert_no'],
                'card_estimated_value'=>$entryData['card_estimated_value'],

                //item type auto authentication
                'auto_authentication_description_one'=>$entryData['auto_authentication_description_one'],
                'auto_authentication_description_two'=>$entryData['auto_authentication_description_two'],
                'auto_authentication_description_three'=>$entryData['auto_authentication_description_three'],
                'auto_authentication_serial_number'=>$entryData['auto_authentication_serial_number'],
                'auto_authentication_autographed'=>$entryData['auto_authentication_autographed'],
                'auto_authentication_authenticator_name'=>$entryData['auto_authentication_authenticator_name'],
                'auto_authentication_authenticator_cert_no'=>$entryData['auto_authentication_authenticator_cert_no'],
                'auto_authentication_estimated_value'=>$entryData['auto_authentication_estimated_value'],
                //item type combined service
                'combined_service_description_one'=>$entryData['combined_service_description_one'],
                'combined_service_description_two'=>$entryData['combined_service_description_two'],
                'combined_service_description_three'=>$entryData['combined_service_description_three'],
                'combined_service_serial_number'=>$entryData['combined_service_serial_number'],
                'combined_service_autographed'=>$entryData['combined_service_autographed'],
                'combined_service_authenticator_name'=>$entryData['combined_service_authenticator_name'],
                'combined_service_authenticator_cert_no'=>$entryData['combined_service_authenticator_cert_no'],
                'combined_service_estimated_value'=>$entryData['combined_service_estimated_value'],

                //item type combined service
                'reholder_certification_number'=>$entryData['reholder_certification_number'],
                'reholder_estimated_value'=>$entryData['reholder_estimated_value'],

                //item type crossover
                'crossover_description_one'=>$entryData['crossover_description_one'],
                'crossover_description_two'=>$entryData['crossover_description_two'],
                'crossover_description_three'=>$entryData['crossover_description_three'],
                'crossover_serial_number'=>$entryData['crossover_serial_number'],
                'crossover_autographed'=>$entryData['crossover_autographed'],
                'crossover_authenticator_name'=>$entryData['crossover_authenticator_name'],
                'crossover_authenticator_cert_no'=>$entryData['crossover_authenticator_cert_no'],
                'crossover_estimated_value'=>$entryData['crossover_estimated_value'],
                'crossover_item_type'=>$entryData['crossover_item_type'],
                'crossover_minimum_grade'=>$entryData['crossover_minimum_grade'],
                'pieces'=>0,
            ];

            if ($entry){
                $item = EntryItems::create($entryData);
            }
            $response = ['status'=>200,'message'=>'Success','data'=>$entry];
            return response()->json($response);
//            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        set_page_meta('Edit Entry');
        $item = $this->entryService->get($id);
        $products = Product::orderBy('id','ASC')->get();
        $allCustomers = Customer::orderBy('id','DESC')->select('id','name')->get();
        $allPromos = Promo::orderBy('id','DESC')->select('id','name')->get();
        $allThirdParties = ThirdParty::orderBy('id','DESC')->select('id','name')->get();
        $allAuthenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();

//        return $allThirdParties;
        return view('admin.entry.edit',compact('products','allCustomers','allPromos','allThirdParties','allAuthenticators'));
        try {

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
        $items = EntryItems::where('entry_id',$id)->orderBy('created_at', 'desc')->get();

        $entry = Entry::find($id);
//        return $item;
        return view('admin.entry.show',compact('items','entry'));
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
            $this->entryService->delete($id);
            record_deleted_flash();
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

    public function addAdditionalPieces(Request $request)
    {
        $id = $request->item_id;
        $pieces = $request->pieces;

        $item = EntryItems::find($id);

        $data = [
            "entry_id"=> $item->entry_id,
            "itemType"=> $item->itemType,
            "card_description_one"=> $item->card_description_one,
            "card_description_two"=> $item->card_description_two,
            "card_description_three"=> $item->card_description_three,
            "card_serial_number"=> $item->card_serial_number,
            "card_autographed"=> $item->card_autographed,
            "card_authenticator_name"=> $item->card_authenticator_name,
            "card_authenticator_cert_no"=> $item->card_authenticator_cert_no,
            "card_estimated_value"=> $item->card_estimated_value,
            "auto_authentication_description_one"=> $item->auto_authentication_description_one,
            "auto_authentication_description_two"=> $item->auto_authentication_description_two,
            "auto_authentication_description_three"=> $item->auto_authentication_description_three,
            "auto_authentication_serial_number"=> $item->auto_authentication_serial_number,
            "auto_authentication_autographed"=> $item->auto_authentication_autographed,
            "auto_authentication_authenticator_name"=> $item->auto_authentication_authenticator_name,
            "auto_authentication_authenticator_cert_no"=> $item->auto_authentication_authenticator_cert_no,
            "auto_authentication_estimated_value"=> $item->auto_authentication_estimated_value,
            "combined_service_description_one"=> $item->combined_service_description_one,
            "combined_service_description_two"=> $item->combined_service_description_two,
            "combined_service_description_three"=> $item->combined_service_description_three,
            "combined_service_serial_number"=> $item->combined_service_serial_number,
            "combined_service_autographed"=> $item->combined_service_autographed,
            "combined_service_authenticator_name"=> $item->combined_service_authenticator_name,
            "combined_service_authenticator_cert_no"=> $item->combined_service_authenticator_cert_no,
            "combined_service_estimated_value"=> $item->combined_service_estimated_value,
            "reholder_certification_number"=> $item->reholder_certification_number,
            "reholder_estimated_value"=> $item->reholder_estimated_value,
            "crossover_description_one"=> $item->crossover_description_one,
            "crossover_description_two"=> $item->crossover_description_two,
            "crossover_description_three"=> $item->crossover_description_three,
            "crossover_serial_number"=> $item->crossover_serial_number,
            "crossover_autographed"=> $item->crossover_autographed,
            "crossover_authenticator_name"=> $item->crossover_authenticator_name,
            "crossover_authenticator_cert_no"=> $item->crossover_authenticator_cert_no,
            "crossover_estimated_value"=> $item->crossover_estimated_value,
            "crossover_item_type"=> $item->crossover_item_type,
            "crossover_minimum_grade"=> $item->crossover_minimum_grade,
            "pieces"=> $item->pieces,
        ];
        for ($x = 1; $x <= $pieces; $x++) {
            $newItem = EntryItems::create($data);
        }

        return redirect()->back();
    }
    public function newItemAdd(Request $request)
    {

        $data = $request->all();
        if ($request->itemType){
            $item = EntryItems::create($data);
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function itemDestroy(Request $request)
    {
        $item = EntryItems::find($request->item_id)->delete();

        return redirect()->back();
    }
}
