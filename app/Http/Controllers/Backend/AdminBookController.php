<?php

namespace App\Http\Controllers\Backend;

use App\Model\ImportBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Author;
use App\Model\Category;
use App\Model\Book;
use App\Model\PublishingCompany;
use App\Http\Requests\BookRequest;

class AdminBookController extends Controller
{
    public function __construct()
    {
        $authors = Author::where('at_status', 1)->get();
        $categories = Category::all();
        $publishingCompany = PublishingCompany::where('pc_status', 1)->get();
        view()->share([
            'activeMenu' => 'Book',
            'authors' => $authors,
            'categories' => $categories,
            'publishingCompany' => $publishingCompany
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $books = Book::with(['categories:id,c_name', 'publishingCompany:id,pc_name', 'authorBook', 'amount']);

        if ($request->b_name) {
            $books = $books->where('b_name', 'like', '%'.$request->b_name.'%');
        }

        if ($request->b_code_book) {
            $books = $books->where('b_code_book', $request->b_code_book);
        }

        if ($request->author_id) {
            $listBook = \DB::table('author_book')->where('author_id', $request->author_id)->pluck('book_id');
            $books = $books->whereIn('id', $listBook);
        }

        if ($request->b_categories_id) {
            $books = $books->where('b_categories_id', $request->b_categories_id);
        }

        if ($request->b_publishing_company_id) {
            $books = $books->where('b_publishing_company_id', $request->b_publishing_company_id);
        }

        if ($request->b_status) {
            $books = $books->where('b_status', $request->b_status);
        }

        $books = $books->orderByDesc('id')->paginate(10);
        //dd($books->toArray());
        return view('backend.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
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
        $book = Book::with('authorBook')->find($id);
        if (!$book) {
            return redirect()->route('get.list.book')->with('danger', 'Data does not exist');
        }

        return view('backend.book.update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
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
        $book = Book::findOrFail($id);
        if (!$book) {
            return redirect()->route('get.list.book')->with('danger', 'Data does not exist.');
        }
        try {
            $book->delete();
            return redirect()->back()->with('success','Delete successfully !!!');
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->back()->with('danger', 'Error could not save data.');
        }
    }
    public function createOrUpdate($request, $id = NULL)
    {
        $data = $request->except('_token', 'author');

        if ($id !== NULL ) {
            $book = Book::find($id);
        }
        $data['updated_at'] = now();

        \DB::beginTransaction();
        try {
            if ($id === NULL) {
                $data['created_at'] = now();
                $id = Book::insertGetId($data);
                if($id) {
                    if(!empty($request->author)) {
                        $this->createAuthorBook($request->author, $id);
                    }
                    if (!empty($request->ib_amount) || !empty($request->ib_issue_number)) {
                        $this->importBook($request, $id);
                    }
                }
            } else {
                \DB::table('author_book')->where('book_id', $id)->delete();
                if(!empty($request->author)) {
                    $this->createAuthorBook($request->author, $id);
                }
                $book->update($data);
            }
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollBack();
            \Log::error($exception);
            return false;
        }
    }

    public function createAuthorBook($author, $id)
    {
        foreach($author as $value) {
            \DB::table('author_book')->insert(['author_id'=> $value, 'book_id'=> $id]);
        }
    }

    public function importBook($request, $id)
    {
        $importBook = new ImportBook();
        $importBook->ib_books_id = $id;
        $importBook->ib_amount = !empty($request->ib_amount) ? $request->ib_amount : 0;
        $importBook->ib_issue_number = $request->ib_issue_number;
        $importBook->save();
    }
}
