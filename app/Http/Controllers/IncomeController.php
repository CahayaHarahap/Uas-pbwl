<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Income, Category};

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::get();

        return view('apps.income.index')->with('income', $income);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('apps.income.create')->with('category', $category);
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
        Income::create($data);

        return redirect()->route('income');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $category = Category::get();
        return view('apps.income.edit')->with('income', $income)
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
        $income = Income::findOrFail($request->id);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $income->update($request->all());
        return redirect()->route('income');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $income = Income::findOrFail($request->id);

        $income->delete();
        return redirect()->back();
    }
}
