<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\CandidateInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Mail;

class CandidateController extends Controller
{
    // Returns index View for new candidates
    public function index()
    {
        //SELECT only new candidates
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', 1)
            ->paginate(10, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;
        $type = 1;
        return view('candidate.index', compact('candidates', 'type'));
    }

    // Returns Search View for candidates
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $candidateType = $request->type;
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', $candidateType)
            ->where('first_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
            ->paginate(5, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;

        return view('candidate.search', compact('candidates', 'searchTerm'));
    }

    // Returns index View for recruited candidates
    public function recruitedCandidate()
    {
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', 2)
            ->paginate(10, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;
        $type = 2;
        return view('candidate.index', compact('candidates', 'type'));
    }

    //Returns the show view of the appropriate Candidate
    public function show($id)
    {
        $candidate = collect( DB::select
        ('
            SELECT
            users.id AS id,
            users.first_name AS first_name,
            users.last_name AS last_name,
            users.nic AS nic,
            users.gender AS gender,
            users.dob AS dob,
            users.marital_status AS marital_status,
            users.address AS address,
            users.phone_number AS phone_number,
            users.mobile_number AS mobile_number,
            users.email AS email,
            candidate_infos.cv AS cv,
            candidate_infos.certificates AS certificates,
            user_types.id AS user_type

            FROM
            users,
            user_types,
            candidate_infos

            WHERE
            users.id = "'.$id.'"
            AND
            users.user_type_id = user_types.id
            AND
            candidate_infos.user_id = "'.$id.'"
            AND
            (user_types.id = 1 OR user_types.id = 2)
        '))->first();
        return view('candidate.show', compact('candidate'));
    }

    //Returns the Edit view of the appropriate Candidate
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $candidateInfo = CandidateInfo::where('user_id', '=', $id)->first();
        return view('candidate.edit', compact('user', 'candidateInfo'));
    }

    //When button RECRUIT is pressed, send email to apropriate candidate
    public function email($id)
    {
        $user = User::findOrFail($id);
        $candidateInfo = CandidateInfo::where('user_id', '=', $id)->first();


        $title = "Congratulation!"; // can also appen car name here
        $name = Auth::user()->first_name.' '.Auth::user()->last_name; //or "RecruiterHub"
        if (env('APP_ENV') == "local")
        {
          $email = 'tofy.zubair@gmail.com';
        } else {
          $email = $user->email;
        }

        try {

          Mail::send('email.recruited', ['title' => $title, 'content' => $user], function ($message) use ( $email, $name, $title)
          {
              $message->from('support@recruiterhub.io', 'RecruiterHub Team');
              $message->to($email, $name);
              $message->subject($title);
          });

        } catch (\Exception $e) {

        }

        //set user type to 2
        User::find($id)
          ->update(['user_type_id' => 2]);

        return redirect('candidate')->with('success', 'Candidate Recruited Successfully');
        // return back()->with('success','Email Sent!');
    }

    //Data from the form in the Edit view uses the update function to update data in the database
    public function update(Request $data, $id)
    {
        $user = User::find($id);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->user_type_id = $data['user_type_id'];
        $user->nic = $data['nic'];
        $user->gender = $data['gender'];
        $user->dob = $data['dob'];
        $user->marital_status = $data['marital_status'];
        $user->address = $data['address'];
        $user->phone_number = $data['phone_number'];
        $user->mobile_number = $data['mobile_number'];
        $user->email = $data['email'];
        $result = $user->save();

        $info = CandidateInfo::where('user_id', $id)->first();
        $info->cv = 'cv.pdf';
        $info->certificates = 'certificates.pdf';
        $info->save();

        if (Auth::user()->user_type_id == 4){
            //If submission of data is successful return to candidates index page with successful message
            if ($result){
                return redirect('candidate')->with('success', 'Candidate Updated');
            }
            //else display fail
            else{
                return back()->with('error','Failed to save!');
            }
        }
        else{
            //If submission of data is successful return to candidate show page with successful message
            if ($result){
                return redirect()->route('candidate.show', Auth::user()->id)->with('success', 'Candidate Updated');
            }
            //else display fail
            else{
                return back()->with('error','Failed to update profile!');
            }
        }

    }

    //Function to delete an application
    public function destroy($id)
    {
        $candidate = User::findOrFail($id);
        $result = $candidate->delete();
        $info = CandidateInfo::where('user_id', $id)->first()->delete();

        //If deletion of data is successful return to previous page with successful message
        if ($result){
            return redirect('candidate')->with('success', 'Candidate deleted');
        }
        //else display fail
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
