<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{BookReturn, BookLoan};

class BookReturnController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_return = BookReturn::orderBy('id', 'desc')->get();

        return view('apps.book_return.index')->with('book_return', $book_return);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_loan = BookLoan::get();
        return view('apps.book_return.create')->with('book_loan', $book_loan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $book_return = $request->all();
        $book_return['user_id'] = auth()->user()->id;

        BookReturn::create($book_return);
        return redirect()->route('book_return');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookReturn $book_return)
    {
        $book_loan = BookLoan::get();
        return view('apps.book_return.edit')->with('book_loan', $book_loan)
                                            ->with('book_return', $book_return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $book_return = BookReturn::findOrFail($request->id);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $book_return->update($data);
        return redirect()->route('book_return');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book_return = BookReturn::findOrFail($request->id);
        $book_return->delete();

        return redirect()->back();
    }
}
