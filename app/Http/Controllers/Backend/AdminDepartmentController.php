<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Department;
use App\Http\Requests\DepartmentRequest;

class AdminDepartmentController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Department',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::orderBy('id', 'DESC')->paginate(10);
        $viewData = [
            'departments' => $departments
        ];
        return view('backend.department.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        //
        $this->createOrUpdate($request);
        return redirect()->back()->with('success', 'Add successfully !!!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $department = Department::findOrFail($id);
        if (!$department) {
            return redirect()->route('get.list.department')->with('danger', 'Data does not exist');
        }
        return view('backend.department.update', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        //
        $this->createOrUpdate($request,$id);
        return redirect()->back()->with('success', 'Update successfully !!! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $department = Department::findOrFail($id);
        if (!$department) {
            return redirect()->route('get.list.department')->with('danger', 'Data does not exist');
        }
        $department->delete();
        return redirect()->back()->with('success', 'Delete successfully !!!');
    }

    public function createOrUpdate($request , $id ='')
    {
        $department = new Department();
        if ($id)
        {
            $department = Department::findOrFail($id);
        }
        $department->d_name        = $request->d_name;
        $department->save();
    }
}
