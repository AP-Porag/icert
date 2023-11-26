<?php

namespace App\Http\Controllers\Admin\User;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserDataTable $dataTable)
    {
        set_page_meta('Users');
        return $dataTable->render('admin.users.index');
    }

    public function create()
    {
        set_page_meta('Create User');
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {

        try {
            $data = $request->validated();
            if (Auth::user()->user_type != User::USER_TYPE_ADMIN){
                $data['user_type'] = Auth::user()->user_type;
            }else{
                $user_type = $data['user_type'];
                $data['user_type'] = $user_type;
            }
            $user = $this->userService->storeOrUpdate($data, null);

            DB::table('model_has_roles')->insert(
                ['role_id' => $request->input('role'), 'model_id' => $user->id,'model_type'=>'App\Models\User
']
            );
            record_created_flash();
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit User');
//            $user = $this->userService->get($id);
            $user = User::where('id',$id)->with('roles')->get();
            return $user;
            $roles = Role::select('id', 'name')->get();
            return view('admin.users.edit', compact('user','roles'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();

        $this->userService->storeOrUpdate($data, $id);

        $mhrs = DB::table('model_has_roles')->get();

        foreach ($mhrs as $mhr){
            $mhr->delete();
        }

        DB::table('model_has_roles')->insert(
            ['role_id' => $request->input('role'), 'model_id' => $id,'model_type'=>'App\Models\User
']
        );
        record_updated_flash();
        try {

            return redirect()->route('admin.users.index');
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
