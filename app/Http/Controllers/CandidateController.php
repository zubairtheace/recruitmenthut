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

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', 1)
            ->paginate(5, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;
        return view('candidate.index', compact('candidates'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', 1)
            ->where('first_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
            ->paginate(5, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;

        return view('candidate.search', compact('candidates', 'searchTerm'));
    }

    public function recruitedCandidate()
    {
        $candidates = User::
        join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_types.id', 2)
            ->paginate(5, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name'))
        ;


        return view('candidate.index', compact('candidates'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            user_types.id AS user_type

            FROM
            users,
            user_types

            WHERE
            users.id = "'.$id.'"
            AND
            users.user_type_id = user_types.id
            AND
            (user_types.id = 1 OR user_types.id = 2)
        '))->first();
        // dd($candidate);
        return view('candidate.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $candidateInfo = CandidateInfo::where('user_id', '=', $id)->first();
        return view('candidate.edit', compact('user', 'candidateInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            if ($result){
                return redirect('candidate')->with('success', 'Candidate Updated');
            }
            else{
                return back()->with('error','Failed to save!');
            }
        }
        else{
            if ($result){
                return redirect()->route('candidate.show', Auth::user()->id)->with('success', 'Candidate Updated');
            }
            else{
                return back()->with('error','Failed to update profile!');
            }
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
        $candidate = User::findOrFail($id);
        $result = $candidate->delete();
        $info = CandidateInfo::where('user_id', $id)->first()->delete();
        if ($result){
            return redirect('candidate')->with('success', 'Candidate deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
