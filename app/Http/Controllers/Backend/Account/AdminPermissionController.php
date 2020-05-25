<?php

namespace App\Http\Controllers\Backend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Model\Permission;
use App\Model\GroupPermission;

class AdminPermissionController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Permission',
        ]);
    }
    //
    public function index()
    {
        $permissions = Permission::with([
            'groups' => function($groups)
            {
                $groups->select('id', 'name');
            }
        ])->orderBy('id', 'DESC')->paginate(10);

        return view('backend.account.permission.index', compact('permissions'));
    }

    //
    public function create()
    {
        $permissionGroups = GroupPermission::all();
        return view('backend.account.permission.create', compact('permissionGroups'));
    }

    //
    public function store(PermissionRequest $request)
    {
        $this->createOrUpdate($request);
        return redirect()->back()->with('success','Add successfully !!!');
    }

    //
    public function edit($id)
    {
        $permissionGroups = GroupPermission::all();
        $permission = Permission::findOrFail($id);

        if (!$permission) {
            return redirect()->route('get.list.permission')->with('danger', 'Data does not exist');
        }

        return view('backend.account.permission.update',compact('permission', 'permissionGroups'));
    }
    //

    public function update(PermissionRequest $request,$id)
    {
        $this->createOrUpdate($request,$id);
        return redirect()->back()->with('success','Update successfully !!!');
    }

    //
    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        if (!$permission) {
            return redirect()->route('get.list.permission')->with('danger', 'Data does not exist');
        }
        $permission->delete();
        return redirect()->back()->with('success','Delete successfully !!!');
    }

    //
    public function createOrUpdate($request , $id ='')
    {
        $permission = new Permission();

        if ($id)
        {
            $permission = Permission::findOrFail($id);
        }

        $permission->name                       = safeTitle($request->name);
        $permission->display_name               = $request->name;
        $permission->group_permission_id        = $request->group_permission_id;
        $permission->description                = $request->description;

        $permission->save();
    }
}
