<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\CandidateInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/vacancy';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'nic' => 'required|max:14',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'address' => 'required|max:255',
            'phone_number' => 'required|min:7|max:7',
            'mobile_number' => 'required|min:8|max:8',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_type_id' => '1',
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

        $cv = $data['cv'];
        $input['cvname'] = time().rand(0,100).'.'.$cv->getClientOriginalExtension();
        $cvDestinationPath = public_path('/documents/cv/'.$user->id.'/');
        $cv->move( $cvDestinationPath, $input['cvname'] );

        $certificates = $data['certificates'];
        $input['certificatename'] = time().rand(0,100).'.'.$certificates->getClientOriginalExtension();
        $certDestinationPath = public_path('/documents/certificate/'.$user->id.'/');
        $certificates->move( $certDestinationPath, $input['certificatename'] );

        $candidate = CandidateInfo::create([
           'user_id' => $user->id,
           'cv' => $input['cvname'],
           'certificates' => $input['certificatename'],
       ]);

       return $user;

    }
}
