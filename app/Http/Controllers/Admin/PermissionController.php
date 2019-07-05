<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use test\Mockery\ReturnTypeObjectTypeHint;

class PermissionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::create([
            'permission' => $request->permission,
            'role_id' => $request->role_id,
            'order' => $this->getMaxOrderValue($request->role_id) + 1
        ]);

        return redirect(route('admin.permissions.show', $request->role_id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $roleName = $role->role;
        $user = Auth::user()->getRole()->get()->first();
        return view('admin.permissions.show', [
            'role_id' => $id,
            'role_name' => $roleName,
            'permissions' => $role->getPermissions(),
            'max_order' => $this->getMaxOrderValue($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update(['permission' => $request->permission]);
        return redirect(route('admin.permissions.show', $permission->role_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->back();
    }

    private function getMaxOrderValue($role_id)
    {
        $item = Permission::where('role_id', $role_id)->orderBy('order', 'desc')->first();
        if ($item) {
            return $item->order;
        }
        return 0;
    }

    public function up($permission_id)
    {
        $handlePermission = Permission::find($permission_id);
        $handleOrder = $handlePermission->order;
        $roleId = $handlePermission->role_id;

        if ($handleOrder > 0) {
            $previewByOrder = Permission::where('role_id', $roleId)->where('order', $handleOrder - 1)->first();
            $previewByOrder->update([
                'order' => $handleOrder
            ]);
            $handlePermission->update([
                'order' => $handleOrder - 1
            ]);
        }
        return redirect()->back();
    }

    public function down($permission_id)
    {
        $handlePermission = Permission::find($permission_id);
        $handleOrder = $handlePermission->order;
        $roleId = $handlePermission->role_id;
        $maxOrder = $this->getMaxOrderValue($roleId);

        if ($handleOrder < $maxOrder) {
            $nextByOrder = Permission::where('role_id', $roleId)->where('order', $handleOrder + 1)->first();
            $nextByOrder->update([
                'order' => $handleOrder
            ]);
            $handlePermission->update([
                'order' => $handleOrder + 1
            ]);
        }
        return redirect()->back();
    }
}
