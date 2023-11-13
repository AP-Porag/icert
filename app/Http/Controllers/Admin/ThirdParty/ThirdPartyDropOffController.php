<?php

namespace App\Http\Controllers\Admin\ThirdParty;

use App\DataTables\ThirdPartyDropOffDataTable;
use App\Http\Controllers\Controller;
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
        set_page_meta('Create Third Party Drop');
        return view('admin.third_party.third_party_drop_off.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $this->thirdPartyDropOffService->storeOrUpdate($data, null);
        try {

            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit Third Party Drop');
            $user = $this->userService->get($id);
            return view('admin.third_party.third_party_drop_off.edit', compact('user'));
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
            $this->userService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
