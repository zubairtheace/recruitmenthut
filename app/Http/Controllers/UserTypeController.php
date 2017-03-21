<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\UserType;
use App\Http\Requests\UserTypeRequest;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::paginate(10);
        return view('user-type.index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeRequest $request)
    {
        $result = UserType::create($request->all());
        if ($result){
            return redirect('user-type')->with('success', 'User Type Added');
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
        $userType = UserType::findOrFail($id);
        return view('user-type.show', compact('userType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userType = UserType::findOrFail($id);
        return view('user-type.edit', compact('userType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeRequest $request, $id)
    {
        $userType = UserType::findOrFail($id);
        $result = $userType->update($request->all());
        if ($result){
            return redirect('user-type')->with('success', 'User Type Updated');
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
        $userType = UserType::findOrFail($id);
        $result = $userType->delete();
        if ($result){
            return redirect('user-type')->with('success', 'User Type deleted');
        }
        else{
            return back()->with('error','Failed to delete!');
        }
    }
}
