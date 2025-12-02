<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

class PermissionController extends Controller
{
    public static function loadPermissions($role) {
        $array_permissions = Array();

        $permissions = Permission::with(['resource'])->where('role_id', $role)->get();

        foreach ($permissions as $perm) {
            $array_permissions[$perm->resource->name] = (boolean) $perm->permission;
        }
        session(['user_permissions' => $array_permissions]);
    }

    public static function isAuthorized($resource) {
        $permissions = session('user_permissions');
        
        if(array_key_exists($resource, $permissions)) {
            return $permissions[$resource];
        }
            return false;   
        }   
}
