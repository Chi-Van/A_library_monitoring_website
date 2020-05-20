<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Classs;
use App\Http\Requests\ClassRequest;

class AdminClassController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Class',
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
        $classs = Classs::orderBy('id', 'DESC')->paginate(10);
        $viewData = [
            'classs' => $classs
        ];
        return view('backend.class.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
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
        $class = Classs::findOrFail($id);
        if(!$class) {
            return redirect()->route('get.list.role')->with('danger', 'Data does not exist');
        }
        return view('backend.class.update', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $id)
    {
        //
        $this->createOrUpdate($request,$id);
        return redirect()->back()->with('success','Update successfully !!!');
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
        $class = Classs::findOrFail($id);
        if (!$class) {
            return redirect()->route('get.list.class')->with('danger', 'Data does not exist');
        }
        $class->delete();
        return redirect()->back()->with('success','Delete successfully !!!');
    }

    public function createOrUpdate($request , $id ='')
    {
        $class = new Classs();
        if ($id)
        {
            $class = Classs::findOrFail($id);
        }
        $class->c_name = $request->c_name;
        $class->save();
    }
}
