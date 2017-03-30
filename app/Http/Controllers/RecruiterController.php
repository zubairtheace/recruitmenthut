<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\RecruiterInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check to see if data entered ofr recruiter info is JSON
        // dd(RecruiterInfo::all());
        // $recruiters = User::with('position')->paginate(10);
        $recruiters = DB::select
        ('
            SELECT
            users.id AS id,
            users.first_name AS first_name,
            users.last_name AS last_name,
            user_types.name AS user_type,
            positions.name AS position

            FROM
            users,
            recruiter_infos,
            positions,
            user_types

            WHERE
            users.id = recruiter_infos.user_id
            AND
            recruiter_infos.position_id = positions.id
            AND
            users.user_type_id = user_types.id
            AND
            (user_types.id = 3 OR user_types.id = 4)
        ');
        // dd($recruiters);
        return view('recruiter.index', compact('recruiters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recruiter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        // dd($data);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_type_id' => $data['user_type_id'],
            'nic' => $data['nic'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'marital_status' => $data['marital_status'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $recruiterInfo = RecruiterInfo::create([
           'user_id' => $user->id,
           'position_id' => $data['position_id'],
       ]);

       if ($user){
           return redirect('recruiter')->with('success', 'Recruiter Added');
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
        $recruiter = collect( DB::select
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
            user_types.name AS user_type,
            positions.name AS position

            FROM
            users,
            recruiter_infos,
            positions,
            user_types

            WHERE
            users.id = "'.$id.'"
            AND
            users.id = recruiter_infos.user_id
            AND
            recruiter_infos.position_id = positions.id
            AND
            users.user_type_id = user_types.id
            AND
            (user_types.id = 3 OR user_types.id = 4)
        '))->first();
        // dd($recruiter);
        return view('recruiter.show', compact('recruiter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruiter = Recruiter::findOrFail($id);
        return view('recruiter.edit', compact('recruiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id)([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_type_id' => $data['user_type_id'],
            'nic' => $data['nic'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'marital_status' => $data['marital_status'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $recruiterInfo = RecruiterInfo::findOrFail($id)([
           'user_id' => $user->id,
           'position_id' => $data['position_id'],
       ]);

       if ($user){
           return redirect('recruiter')->with('success', 'Recruiter Updated');
       }
       else{
           return back()->with('error','Failed to save!');
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
        $recruiter = Recruiter::findOrFail($id);
        $result = $recruiter->delete();
        if ($result){
            return redirect('recruiter')->with('success', 'Recruiter deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
