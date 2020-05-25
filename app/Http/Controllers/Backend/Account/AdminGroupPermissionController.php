<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Model\GroupPermission;
use App\Http\Requests\GroupPermissionRequest;

class AdminGroupPermissionController extends Controller
{

    public function __construct()
    {
        view()->share([
            'activeMenu' => 'GroupPermission',
        ]);
    }

    public function index()
    {
        $permissionGroups = GroupPermission::orderBy('id', 'DESC')->paginate(10);

        $viewData = [
            'permissionGroups' => $permissionGroups
        ];

        return view('backend.account.group-permission.index', $viewData);
    }

    public function create()
    {
        return view('backend.account.group-permission.create');
    }

    public function store(GroupPermissionRequest $request)
    {
        $this->createOrUpdate($request);
        return redirect()->back()->with('success', 'Add successfully !!!');
    }

    public function edit($id)
    {
        $permissionGroup = GroupPermission::findOrFail($id);
        if (!$permissionGroup) {
            return redirect()->route('get.list.group-permission')->with('danger', 'Data does not exist');
        }
        return view('backend.account.group-permission.update', compact('permissionGroup'));
    }

    public function update(GroupPermissionRequest $request,$id)
    {
        $this->createOrUpdate($request,$id);
        return redirect()->back()->with('success', 'Update successfully !!! ');
    }

    public function delete($id)
    {
        $permissionGroup = GroupPermission::findOrFail($id);
        if (!$permissionGroup) {
            return redirect()->route('get.list.group-permission')->with('danger', 'Data does not exist');
        }
        $permissionGroup->delete();
        return redirect()->back()->with('success', 'Delete successfully !!!');
    }

    public function createOrUpdate($request , $id ='')
    {
        $groupPermission = new GroupPermission();

        if ($id)
        {
            $groupPermission = GroupPermission::findOrFail($id);
        }

        $groupPermission->name        = $request->name;
        $groupPermission->description = $request->description;

        $groupPermission->save();
    }

}
