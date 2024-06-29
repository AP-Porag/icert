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
//        $item = Entry::find(1);
//        $receivingCOunt = $item->receivings->count();
//
//        if($receivingCOunt > 0){
//            $status = 'Already Received/Receiving of Order Finished (ROF)';
//        }else{
//            $status = 'No Receiving';
//        }
//
//        return $status;

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
                'entrySKU'=>$this->getSKUNumber(),
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
        try {
            $entry = $this->entryService->get($id);
            $products = Product::orderBy('id','ASC')->get();
            $allCustomers = Customer::orderBy('id','DESC')->select('id','name')->get();
            $allPromos = Promo::orderBy('id','DESC')->select('id','name')->get();
            $allThirdParties = ThirdParty::orderBy('id','DESC')->select('id','name')->get();
            $allAuthenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();

//        return $allThirdParties;
            return view('admin.entry.edit',compact('products','allCustomers','allPromos','allThirdParties','allAuthenticators','entry'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(Request $request, $id)
    {

        try {

            $entryData = $request->all();
            $data = [
                "customer_id"=>$entryData['customerId'],
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

            $entry = $this->entryService->storeOrUpdate($data, $id);

            $response = ['status'=>200,'message'=>'Success','id'=>$id];
            return response()->json($response);

//            record_updated_flash();
        } catch (\Exception $e) {
            return back();
        }
    }

    public function show($id)
    {

        set_page_meta('Show Entry');
        $items = EntryItems::where('entry_id',$id)->orderBy('created_at', 'desc')->get();
        $authenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();

        $grades=[
                [
                    'id'=>1,
                    'name'=>'0'
                ],

            [
                'id'=>2,
                'name'=>'1'
            ],
            [
                'id'=>3,
                'name'=>'1.5'
            ],
            [
                'id'=>4,
                'name'=>'2'
            ],
            [
                'id'=>5,
                'name'=>'2.5'
            ],
            [
                'id'=>6,
                'name'=>'3'
            ],
            [
                'id'=>7,
                'name'=>'3.5'
            ],
            [
                'id'=>8,
                'name'=>'4'
            ],
            [
                'id'=>9,
                'name'=>'4.5'
            ],
            [
                'id'=>10,
                'name'=>'5'
            ],
            [
                'id'=>11,
                'name'=>'5.5'
            ],
            [
                'id'=>12,
                'name'=>'6'
            ],
            [
                'id'=>13,
                'name'=>'6.5'
            ],
            [
                'id'=>14,
                'name'=>'7'
            ],
            [
                'id'=>15,
                'name'=>'7.5'
            ],
            [
                'id'=>16,
                'name'=>'8'
            ],
            [
                'id'=>17,
                'name'=>'8.5'
            ],
            [
                'id'=>18,
                'name'=>'9'
            ],
            [
                'id'=>19,
                'name'=>'9.5'
            ],
            [
                'id'=>20,
                'name'=>'10'
            ],
            [
                'id'=>21,
                'name'=>'10 (p)'
            ],
            ];

        $entry = Entry::find($id);
//        return $items;
        return view('admin.entry.show',compact('items','entry','authenticators','grades'));
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

    public function newItemEdit(Request $request)
    {
        $id = $request->item_id;
        $pieces = $request->pieces;

        $item = EntryItems::find($id);

            $item->itemType = $request->itemType;
            $item->card_description_one = $request->card_description_one;
            $item->card_description_two = $request->card_description_two;
            $item->card_description_three = $request->card_description_three;
            $item->card_serial_number = $request->card_serial_number;
            $item->card_autographed = $request->card_autographed;
            $item->card_authenticator_name = $request->card_authenticator_name;
            $item->card_authenticator_cert_no = $request->card_authenticator_cert_no;
            $item->card_estimated_value = $request->card_estimated_value;
            $item->auto_authentication_description_one = $request->auto_authentication_description_one;
            $item->auto_authentication_description_two = $request->auto_authentication_description_two;
            $item->auto_authentication_description_three = $request->auto_authentication_description_three;
            $item->auto_authentication_serial_number = $request->auto_authentication_serial_number;
            $item->auto_authentication_autographed = $request->auto_authentication_autographed;
            $item->auto_authentication_authenticator_name = $request->auto_authentication_authenticator_name;
            $item->auto_authentication_authenticator_cert_no = $request->auto_authentication_authenticator_cert_no;
            $item->auto_authentication_estimated_value = $request->auto_authentication_estimated_value;
            $item->combined_service_description_one = $request->combined_service_description_one;
            $item->combined_service_description_two = $request->combined_service_description_two;
            $item->combined_service_description_three = $request->combined_service_description_three;
            $item->combined_service_serial_number = $request->combined_service_serial_number;
            $item->combined_service_autographed = $request->combined_service_autographed;
            $item->combined_service_authenticator_name = $request->combined_service_authenticator_name;
            $item->combined_service_authenticator_cert_no = $request->combined_service_authenticator_cert_no;
            $item->combined_service_estimated_value = $request->combined_service_estimated_value;
            $item->reholder_certification_number = $request->reholder_certification_number;
            $item->reholder_estimated_value = $request->reholder_estimated_value;
            $item->crossover_description_one = $request->crossover_description_one;
            $item->crossover_description_two = $request->crossover_description_two;
            $item->crossover_description_three = $request->crossover_description_three;
            $item->crossover_serial_number = $request->crossover_serial_number;
            $item->crossover_autographed = $request->crossover_autographed;
            $item->crossover_authenticator_name = $request->crossover_authenticator_name;
            $item->crossover_authenticator_cert_no = $request->crossover_authenticator_cert_no;
            $item->crossover_estimated_value = $request->crossover_estimated_value;
            $item->crossover_item_type = $request->crossover_item_type;
            $item->crossover_minimum_grade = $request->crossover_minimum_grade;
            $item->pieces = $request->pieces;
            $item->save();


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

    public function getSKUNumber()
    {
        $entries = Entry::all();
        if ($entries->count() > 0){

            $lastSKUId = Entry::orderBy('id', 'DESC')->first()->entrySKU;
//            return $lastSKUId;
            $splitedLastSKUId = str_split($lastSKUId,4);
            $madedSKU = $splitedLastSKUId[1].$splitedLastSKUId[2];
//            return $madedSKU;
            $settingPlusOne = $madedSKU+1;
            $newSKUId = 'IC'.date('y').$settingPlusOne;
//            return $newSKUId;
        }else{
//            $setting = config('settings.admin_order_sku');
            $setting = 20000;
            $settingPlusOne = $setting+1;
            $newSKUId = 'IC'.date('y').$settingPlusOne;
        }

        return $newSKUId;
    }
}
