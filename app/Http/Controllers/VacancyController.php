<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use DB;
use App\Vacancy;
use App\Http\Requests\VacancyRequest;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::whereDate('closing_date', '>=', date('Y-m-d'))->paginate(10);
        return view('vacancy.index', compact('vacancies'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $vacancies = Vacancy::whereDate('closing_date', '>=', date('Y-m-d'))
            ->where('name', 'like', '%' . $request->search . '%')
            ->paginate(10);

        return view('vacancy.search', compact('vacancies', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        $result = Vacancy::create($request->all());
        if ($result){
            return redirect('vacancy')->with('success', 'Vacancy Added');
        }
        else{
            return back()->with('error','Failed to save!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancy.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancy.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacancyRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $result = $vacancy->update($request->all());
        if ($result){
            return redirect('vacancy')->with('success', 'Vacancy Updated');
        }
        else{
            return back()->with('error','Failed to update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $result = $vacancy->delete();
        if ($result){
            return redirect('vacancy')->with('success', 'Vacancy deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
