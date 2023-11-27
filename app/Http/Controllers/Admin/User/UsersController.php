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
        $data = $request->validated();

        try {
            if (Auth::user()->user_type != User::USER_TYPE_ADMIN){
                $data['user_type'] = Auth::user()->user_type;
            }else{
                $user_type = $data['user_type'];
                $data['user_type'] = $user_type;
            }
            $user = $this->userService->storeOrUpdate($data, null);
            $user->assignRole([$request->input('role')]);

            record_created_flash();
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
        }
        return back();
    }

    public function edit($id)
    {
        try {
            set_page_meta('Edit User');
            $user = $this->userService->get($id);
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

        try {
            $this->userService->storeOrUpdate($data, $id);

            $user = User::find($id);
            $user->syncRoles([$request->input('role')]);

            record_updated_flash();
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
            $user = User::find($id);

            foreach ($user->roles as $role){
                $user->removeRole($role);
            }
            $this->userService->delete($id);
            record_deleted_flash();
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }

}
