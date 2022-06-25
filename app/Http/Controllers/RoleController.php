<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('layouts.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('layouts.roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateRoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $role = Role::create($request->only(['name', 'description']));
            $role->permissions()->sync($request->permissionIds);
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Create role success');
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error', 'Create Role failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('layouts.roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('layouts.roles.edit', ['role' => $role, 'permissions' => Permission::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateRoleRequest $request, Role $role)
    {
        Db::beginTransaction();
        try {
            $role->update($request->only(['name', 'description']));
            $role->permissions()->sync($request->permissionIds);
            Db::commit();
            return redirect()->route('roles.index')->with('success', 'Update role success');
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('error', 'Update role failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Delete role success');
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            return back()->with('error', 'Delete role failed');
        }
    }
}
