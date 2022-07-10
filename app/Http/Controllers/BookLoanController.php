<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book, Borrower, BookLoan};

class BookLoanController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_loan = BookLoan::orderBy('id', 'desc')->get();

        return view('apps.book_loan.index')->with('book_loan', $book_loan);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::get();
        $borrower = Borrower::get();
        return view('apps.book_loan.create')->with('book', $book)
                                       ->with('borrower', $borrower);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $book_loan = $request->all();
        $book_loan['user_id'] = auth()->user()->id;
        BookLoan::create($book_loan);
        return redirect()->route('book_loan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookLoan $book_loan)
    {
        $book = Book::get();
        $borrower = Borrower::get();
        return view('apps.book_loan.edit')->with('book', $book)
                                          ->with('book_loan', $book_loan)
                                          ->with('borrower', $borrower);
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
        $book_loan = BookLoan::findOrFail($request->id);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $book_loan->update($request->all());
        return redirect()->route('book_loan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book_loan = BookLoan::findOrFail($request->id);
        $book_loan->delete();

        return redirect()->back();
    }
}
