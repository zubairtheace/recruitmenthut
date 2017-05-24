<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use View;
use App\Interview;
use App\Http\Requests\InterviewRequest;
use Mail;
use App\User;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = Interview::orderBy('scheduled_on', 'desc')->paginate(10);
        return view('interview.index', compact('interviews'));
    }

    /**
     * Display a listing of the resource for a specific user.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidateInterview($id)
    {
        $interviews = Interview::where('application_id', '=', $id)->orderBy('scheduled_on', 'desc')->paginate(10);
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

            //send mail to candidate and interviewer
            $this->emailNotification($result->id, $result->application_id, $result->interviewer_id, $result->scheduled_on);
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
    public function emailNotification($id, $aplId, $intvId, $scheduledOn)
    {
      //prepare the email
      $candidate = User::findOrFail($aplId);
      $interviewer = User::findOrFail($intvId);

      $title = "Interview - Notification"; // can also appen car name here
      $name = "RecruiterHub";

      $candidateName = $candidate->first_name." ".$candidate->last_name;
      $interviewerName = $interviewer->first_name." ".$interviewer->last_name;

      //for debugging
      if(env('APP_ENV') == "local"){
        $candidateEmail = 'umar.mw@gmail.com';
        $interviewerEmail = 'umar.mw@gmail.com';
      } else {
        $candidateEmail = $candidate->email;
        $interviewerEmail = $interviewer->email;
      }

      //send email to candidate
      Mail::send('email.notifycandidate', ['title' => $title, 'scheduledOn' => $scheduledOn, 'candidateName' => $candidateName, 'interviewerName' => $interviewerName], function ($message) use ( $candidateEmail, $candidateName, $title)
      {
          $message->from('support@recruiterhub.io', 'RecruiterHub Team');
          $message->to($candidateEmail, $candidateName);
          $message->subject($title);
      });

      //send email to interviewer
      Mail::send('email.notifyinterviewer', ['title' => $title, 'scheduledOn' => $scheduledOn, 'candidateName' => $candidateName, 'interviewerName' => $interviewerName], function ($message) use ( $interviewerEmail, $interviewerName, $title)
      {
          $message->from('support@recruiterhub.io', 'RecruiterHub Team');
          $message->to($interviewerEmail, $interviewerName);
          $message->subject($title);
      });

      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  public function individualInterview($id)
    //  {
    //      $interview = collect( DB::select
    //      ('
    //          SELECT
    //          applications.id AS applicaton_id,
    //          vacancies.id AS vacancy_id,
    //          vacancies.name AS vacancy_name,
    //          interviews.id AS interview_id,
    //          interviews.type AS interview_type,
    //          interview_types.id AS interview_type_id,
    //          interview_types.name AS interview_type_name,
    //          users.id AS user_id,
    //          users.first_name AS first_name,
    //          users.last_name AS last_name
    //
    //          FROM
    //          applications,
    //          vacancies,
    //          interviews,
    //          interview_types,
    //          users
     //
    //          WHERE
    //
     //
     //
    //
    //          users.id = "'.$id.'"
    //          AND
    //          users.id = recruiter_infos.user_id
    //          AND
    //          recruiter_infos.position_id = positions.id
    //          AND
    //          users.user_type_id = user_types.id
    //          AND
    //          (user_types.id = 3 OR user_types.id = 4)
    //      '))->first();
    //  }

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
     * Display a listing of the resource for a specific user.
     *
     * @return \Illuminate\Http\Response
     */
    public function conduct($id)
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
