<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PublishingCompany;
use App\Http\Requests\PublishingCompanyRequest;

class AdminPublishingCompanyController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Publishing_Company',
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
        $publishingCompany = PublishingCompany::orderBy('id', 'DESC')->paginate(10);
        $viewData = [
            'publishingCompany' => $publishingCompany
        ];
        return view('backend.publishing_company.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.publishing_company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublishingCompanyRequest $request)
    {
        //
        if ($this->createOrUpdate($request)) {
            return redirect()->back()->with('success','Add successfully !!!');
        }
        return redirect()->back()->with('danger', 'Error could not save data.');
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
        $publishingCompany = PublishingCompany::find($id);
        if (!$publishingCompany) {
            return redirect()->route('get.list.publishing_company')->with('danger', 'Data does not exist');
        }

        return view('backend.publishing_company.update', compact('publishingCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($this->createOrUpdate($request, $id)) {
            return redirect()->back()->with('success','Update successfully !!!');
        }
        return redirect()->back()->with('danger', 'Error could not save data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $publishingCompany = PublishingCompany::findOrFail($id);
        if (!$publishingCompany) {
            return redirect()->route('get.list.publishing_company')->with('danger', 'Data does not exist.');
        }
        try {
            $publishingCompany->delete();

            return redirect()->back()->with('success','Delete successfully !!!');
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->back()->with('danger', 'Error could not save data.');
        }
    }

    /**
     * @param $request
     * @param string $id
     */
    public function createOrUpdate($request , $id ='')
    {
        $publishingCompany = new PublishingCompany();
        if ($id)
        {
            $publishingCompany = PublishingCompany::findOrFail($id);
        }
        $publishingCompany->pc_name = $request->pc_name;
        $publishingCompany->pc_email = $request->pc_email;
        $publishingCompany->pc_phone = $request->pc_phone;
        $publishingCompany->pc_address = $request->pc_address;
        $publishingCompany->pc_status = $request->pc_status;
        if (!$publishingCompany->save()) {
            return false;
        }
        return true;
    }
}
