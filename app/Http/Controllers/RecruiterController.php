<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('recruiter.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
