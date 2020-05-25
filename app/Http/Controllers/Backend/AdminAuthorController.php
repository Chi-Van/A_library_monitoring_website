<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Http\Requests\AuthorRequest;

class AdminAuthorController extends Controller
{
    public function __construct()
    {
        view()->share([
            'activeMenu' => 'Author',
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
        $authors = Author::orderBy('id', 'DESC')->paginate(10);
        return view('backend.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
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
        $author = Author::find($id);
        if (!$author) {
            return redirect()->route('get.list.author')->with('danger', 'Data does not exist');
        }

        return view('backend.author.update', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
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
    public function delete($id)
    {
        //
        $author = Author::findOrFail($id);
        if (!$author) {
            return redirect()->route('get.list.author')->with('danger', 'Data does not exist.');
        }
        try {
            $author->delete();

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

        $author = new Author();
        if ($id)
        {
            $author = Author::findOrFail($id);
        }
        $author->at_name = $request->at_name;
        $author->at_email = $request->at_email;
        $author->at_phone = $request->at_phone;
        $author->at_address = $request->at_address;
        $author->at_gender = $request->at_gender;
        if ($request->at_birthday) {
            $author->at_birthday = convertDate($request->at_birthday);
        }
        $author->at_status = $request->at_status;
        if (!$author->save()) {
            return false;
        }
        return true;
    }
}
