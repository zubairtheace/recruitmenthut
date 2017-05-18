<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use View;
use App\Interview;
use App\Http\Requests\InterviewRequest;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = Interview::paginate(10);
        return view('interview.index', compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application_id = Request::segment(3);
        return view('interview.create', compact('application_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterviewRequest $request)
    {
        $result = Interview::create($request->all());
        $request['scheduled_on'] = date('Y-m-d H:i', strtotime(str_replace('-', '/', $request['scheduled_on'])));
        if ($result){
            return redirect('interview')->with('success', 'Interview Added');
        }
        else{
            return back()->with('error','Failed to save!');
        }
        // $interview = Interview::create([
        //     'application_id' => $request['application_id'],
        //     'interviewer_id' => $request['interviewer_id'],
        //     'interview_type_id' => $request['interview_type_id'],
        //     'scheduled_on' => date("Y/m/d"),
        //     'notes' => text,
        //     'rating' => '0'
        // ]);
        //
        // if ($interview){
        //     return redirect('interview')->with('success', 'Interview Added');
        // }
        // else{
        //     return back()->with('error','Failed to save!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interview = Interview::findOrFail($id);
        return view('interview.show', compact('interview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interview = Interview::findOrFail($id);
        return view('interview.edit', compact('interview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterviewRequest $request, $id)
    {
        $interview = Interview::findOrFail($id);
        $request['scheduled_on'] = date('Y-m-d H:i', strtotime(str_replace('-', '/', $request['scheduled_on'])));
        $result = $interview->update($request->all());
        if ($result){
            return redirect('interview')->with('success', 'Interview Updated');
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
        $interview = Interview::findOrFail($id);
        $result = $interview->delete();
        if ($result){
            return redirect('interview')->with('success', 'Interview deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
