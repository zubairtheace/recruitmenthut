<?php

namespace App\Http\Controllers;

use App\User;
use DB;
// use Illuminate\Pagination\Paginator;

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
        $recruiters = User::
            join('recruiter_infos', 'users.id', '=', 'recruiter_infos.user_id')
            ->join('positions', 'recruiter_infos.position_id', '=', 'positions.id')
            ->join('user_types', 'users.user_type_id', '=', 'user_types.id')
            ->whereIn('user_types.id', [3, 4])
            ->paginate(10, array('users.id AS id',
                'users.first_name AS first_name',
                'users.last_name AS last_name',
                'user_types.name AS user_type',
                'positions.name AS position'))
        ;

//            ->get([
//                'users.id AS id',
//                'users.first_name AS first_name',
//                'users.last_name AS last_name',
//                'user_types.name AS user_type',
//                'positions.name AS position'
//            ])
//            ->toArray()

    /*
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
<<<<<<< HEAD
            users.deleted_at IS NULL
            AND
            users.id = recruiter_infos.user_id
=======
                users.id = recruiter_infos.user_id
>>>>>>> 523cedac4a76e595d0514ed31d796a8d44f471da
            AND
            recruiter_infos.position_id = positions.id
            AND
            users.user_type_id = user_types.id
            AND
            (user_types.id = 3 OR user_types.id = 4)
        ');
    */

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
        $user = User::findOrFail($id);
        $recruiterInfo = RecruiterInfo::where('user_id', '=', $id)->first();
        return view('recruiter.edit', compact('user', 'recruiterInfo'));
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

      $info = RecruiterInfo::where('user_id', $id)->first();
      $info->position_id = $data['position_id'];
      $info->save();

       if ($result){
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
        $recruiter = User::findOrFail($id);
        $result = $recruiter->delete();
        $info = RecruiterInfo::where('user_id', $id)->first()->delete();
        if ($result){
            return redirect('recruiter')->with('success', 'Recruiter deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
