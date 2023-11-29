<?php

namespace App\Http\Controllers\Admin\ThirdParty;

use App\DataTables\AuthenticatorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticatorRequest;
use App\Models\Authenticator;
use App\Models\AuthenticatorProduct;
use App\Models\Product;
use App\Services\AuthenticatorService;
use Illuminate\Http\Request;

class AuthenticatorController extends Controller
{
    protected $authenticatorService;

    public function __construct(AuthenticatorService $authenticatorService)
    {
        $this->authenticatorService = $authenticatorService;
    }

    public function index(AuthenticatorDataTable $dataTable)
    {
        set_page_meta('Third Party Authenticators');
        return $dataTable->render('admin.authenticators.index');
    }

    public function create()
    {
        set_page_meta('Create Third Party Authenticators');

        $products = Product::orderBy('id','ASC')->get();
        return view('admin.authenticators.create',compact('products'));
    }

    public function store(AuthenticatorRequest $request)
    {

        $data = $request->validated();
        $authenticator = $this->authenticatorService->storeOrUpdate($data, null);
        try {


            if ($authenticator){

                foreach ($data['products'] as $product){
                    $authenticatorProduct = AuthenticatorProduct::create([
                        "authenticator_id"=>$authenticator->id,
                        "product_id"=>$product,
                    ]);
                }
            }
            record_created_flash();
            return redirect()->route('admin.authenticators.index');
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Third Party Authenticators');
            $item = $this->authenticatorService->get($id);
            $products = Product::orderBy('id','ASC')->get();
            return view('admin.authenticators.edit', compact('item','products'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(AuthenticatorRequest $request, $id)
    {
        $data = $request->validated();

        try {

            $authenticator =  $this->authenticatorService->storeOrUpdate($data, $id);

            if ($authenticator){
                $authenticatorProducts = AuthenticatorProduct::where('authenticator_id',$id)->get();

                foreach ($authenticatorProducts as $authenticatorProduct){
                    $authenticatorProduct->delete();
                }

                foreach ($data['products'] as $product){
                    $authenticatorProduct = AuthenticatorProduct::create([
                        "authenticator_id"=>$id,
                        "product_id"=>$product,
                    ]);
                }
            }

            record_updated_flash();
            return redirect()->route('admin.authenticators.index');
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
            $AuthenticatorsProducts = AuthenticatorProduct::where('authenticator_id',$id)->get();

            if ($AuthenticatorsProducts->count() > 0){
                //find the third party authenticator and update to suspend
                $authenticator =  Authenticator::find($id);
                $authenticator->status = Authenticator::STATUS_SUSPEND;
                $authenticator->save();
            }else{
                $this->authenticatorService->delete($id);
            }

            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
