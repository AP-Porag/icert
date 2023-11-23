<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService extends BaseService
{

    protected $model;

    public function __construct()
    {
        $this->model = Role::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            // Call patent method
            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }

    public function roleEdit($id)
    {
        $role           = Role::find($id);
        $permissions    = Permission::get();
        $rolePermission = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $rolePermissions = array_values($rolePermission);

        return $data = [
            'role'            => $role,
            'permissions'     => $permissions,
            'rolePermissions' => $rolePermissions
        ];
    }
}

