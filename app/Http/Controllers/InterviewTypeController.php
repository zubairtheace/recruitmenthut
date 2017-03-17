<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\InterviewType;
use App\Http\Requests\InterviewTypeRequest;

class InterviewTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewTypes = InterviewType::paginate(10);
        return view('interview-type.index', compact('interviewTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interview-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterviewTypeRequest $request)
    {
        $result = InterviewType::create($request->all());
        if ($result){
            return redirect('interview-type')->with('success', 'Interview Type Added');
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
        $interviewType = InterviewType::findOrFail($id);
        return view('interview-type.show', compact('interviewType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interviewType = InterviewType::findOrFail($id);
        return view('interview-type.edit', compact('interviewType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterviewTypeRequest $request, $id)
    {
        $interviewType = InterviewType::findOrFail($id);
        $result = $interviewType->update($request->all());
        if ($result){
            return redirect('interview-type')->with('success', 'Interview Type Updated');
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
        $interviewType = InterviewType::findOrFail($id);
        $result = $interviewType->delete();
        if ($result){
            return redirect('interview-type')->with('success', 'Interview Type deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
