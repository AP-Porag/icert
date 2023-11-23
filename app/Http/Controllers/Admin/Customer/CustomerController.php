<?php

namespace App\Http\Controllers\Admin\Customer;

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(CustomerDataTable $dataTable)
    {
        set_page_meta('Customers');
        return $dataTable->render('admin.customers.index');
    }

    public function create()
    {
        set_page_meta('Create Customer');

        return view('admin.customers.create');
    }

    public function store(CustomerRequest $request)
    {

        try {
            $data = $request->validated();
            $customer = $this->customerService->storeOrUpdate($data, null);
            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Customer');
            $item = $this->customerService->get($id);
            return view('admin.customers.edit', compact('item'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(CustomerRequest $request, $id)
    {
        $data = $request->validated();

        try {

            $customer =  $this->customerService->storeOrUpdate($data, $id);

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
            $this->customerService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
