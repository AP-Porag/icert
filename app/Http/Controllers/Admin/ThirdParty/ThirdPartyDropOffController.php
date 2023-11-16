<?php

namespace App\Http\Controllers\Admin\ThirdParty;

use App\DataTables\ThirdPartyDropOffDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
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
        return view('admin.third_party.third_party_drop_off.create');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();
            $this->thirdPartyDropOffService->storeOrUpdate($data, null);
            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Third Party Drop Off Center');
            $item = $this->thirdPartyDropOffService->get($id);
            return view('admin.third_party.third_party_drop_off.edit', compact('item'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $this->userService->storeOrUpdate($data, $id);
            record_updated_flash();
            return redirect()->route('admin.third_party.third_party_drop_off.index');
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
}
