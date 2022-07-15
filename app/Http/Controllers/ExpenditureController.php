<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Expenditure, Category};

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exependiture = Expenditure::get();

        return view('apps.expenditure.index')->with('expenditure', $exependiture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('apps.expenditure.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;
        Expenditure::create($data);

        return redirect()->route('expenditure');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        $category = Category::get();
        return view('apps.expenditure.edit')->with('expenditure', $expenditure)
                                            ->with('category', $category);
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
        $exependiture = Expenditure::findOrFail($request->id);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $exependiture->update($request->all());
        return redirect()->route('expenditure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $exependiture = Expenditure::findOrFail($request->id);

        $exependiture->delete();
        return redirect()->back();
    }
}
