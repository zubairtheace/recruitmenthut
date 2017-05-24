<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Application;
use App\Http\Requests\ApplicationRequest;
use Auth;

class ApplicationController extends Controller
{

    // Returns index View
    public function index()
    {
        //If User is a candidate, return only applications for that specific candidate only
        if (Auth::user()->user_type_id == 1){
            $applications = Application::where('candidate_id', '=', Auth::id())->paginate(10);
            return view('application.index', compact('applications'));
        }
        //else return all applications
        else{
            $applications = Application::paginate(10);
            return view('application.index', compact('applications'));
        }
    }

    //Returns Create View
    public function create()
    {
        return view('application.create');
    }

    //Data from the form in create view uses the store function to store data in the database
    public function store(ApplicationRequest $request)
    {
        //Allow only users who have not applied for a job to apply for a job
        if (Application::where('candidate_id',$request['candidate_id'])->where('vacancy_id', $request['vacancy_id'])->count() == 0){
            $application = Application::create([
                'candidate_id' => $request['candidate_id'],
                'vacancy_id' => $request['vacancy_id'],
                'date_applied' => date("Y/m/d"),
                'overall_rating' => '0'
            ]);
            //If submission of data is successful return to previous page with successful message
            if ($application){
                return back()->with('success', 'You have Successfully applied for this vacancy.');
            }
            //else display fail
            else{
                return back()->with('error','Failed to save!');
            }
        }
        //If users already applied for job, return this message
        else{
            return back()->with('error','You have already applied for this job!');
        }
    }

    //Returns the show view of the appropriate application
    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('application.show', compact('application'));
    }

    //Returns the Edit view of the appropriate application
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        return view('application.edit', compact('application'));
    }

    //Data from the form in the Edit view uses the update function to update data in the database
    public function update(ApplicationRequest $request, $id)
    {
        $application = Application::findOrFail($id);
        $result = $application->update($request->all());
        //If submission of data is successful return to previous page with successful message
        if ($result){
            return redirect('application')->with('success', 'Application Updated');
        }
        //else display fail
        else{
            return back()->with('error','Failed to update!');
        }
    }

    //Function to delete an application
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $result = $application->delete();
        //If deletion of data is successful return to previous page with successful message
        if ($result){
            return redirect('application')->with('success', 'Application deleted');
        }
        //else display fail
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
