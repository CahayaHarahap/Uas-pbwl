<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class BorrowerController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrower = Borrower::orderBy('id', 'desc')->get();

        return view('apps.borrower.index')->with('borrower', $borrower);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.borrower.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $borrower = $request->all();

        Borrower::create($borrower);
        return redirect()->route('borrower');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(borrower $borrower)
    {
        return view('apps.borrower.edit')->with('borrower', $borrower);
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
        $borrower = Borrower::findOrFail($request->id);

        $borrower->update($request->all());
        return redirect()->route('borrower');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $borrower = Borrower::findOrFail($request->id);
        $borrower->delete();

        return redirect()->back();
    }
}
