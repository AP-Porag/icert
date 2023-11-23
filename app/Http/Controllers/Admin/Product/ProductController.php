<?php

namespace App\Http\Controllers\Admin\Product;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(ProductDataTable $dataTable)
    {
        set_page_meta('Products');
        return $dataTable->render('admin.products.index');
    }

    public function create()
    {
        set_page_meta('Create Product');

        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {

        try {
            $data = $request->validated();
            $product = $this->productService->storeOrUpdate($data, null);
            record_created_flash();
            return redirect()->route('admin.products.index');
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Product');
            $item = $this->productService->get($id);
            return view('admin.products.edit', compact('item'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        try {

            $product =  $this->productService->storeOrUpdate($data, $id);

            record_updated_flash();
            return redirect()->route('admin.products.index');
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
            $this->productService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
