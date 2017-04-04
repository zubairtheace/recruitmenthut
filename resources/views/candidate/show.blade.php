@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/candidate">Candidates</a> <span class="fa fa-chevron-right"></span> {{ $candidate->first_name }} {{ $candidate->last_name }}
                    <a href="{{ route('candidate.edit', $candidate->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                {!! Form::open([
                                    'route' => ['candidate.update', $candidate->id],
                                    'method' => 'PUT',
                                    'class' => 'form-horizontal'
                                ]) !!}
                                    <input name="first_name" type="hidden" value="{{ $candidate->first_name }}">
                                    <input name="last_name" type="hidden" value="{{ $candidate->last_name }}">
                                    <input name="user_type_id" type="hidden" value= '2' >
                                    <input name="nic" type="hidden" value="{{ $candidate->nic }}">
                                    <input name="gender" type="hidden" value="{{ $candidate->gender }}">
                                    <input name="dob" type="hidden" value="{{ $candidate->dob }}">
                                    <input name="marital_status" type="hidden" value="{{ $candidate->marital_status }}">
                                    <input name="address" type="hidden" value="{{ $candidate->address }}">
                                    <input name="phone_number" type="hidden" value="{{ $candidate->phone_number }}">
                                    <input name="mobile_number" type="hidden" value="{{ $candidate->mobile_number }}">
                                    <input name="email" type="hidden" value="{{ $candidate->email }}">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Recruit</button>
                                    </div>
                                {!! Form::close() !!}
                                <?php
                            }
                        }
                     ?>
                 </div>
                <div class="panel-body">
                    <div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th><div class="text-right">Candidate</th>
                                    <th>#{{ $candidate->id }}</th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="text-right"><strong>First Name</strong></div></td>
                                    <td>{{ $candidate->first_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Last Name</strong></div></td>
                                    <td>{{ $candidate->last_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>National Identity Card Number</strong></div></td>
                                    <td>{{ $candidate->nic }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Gender</strong></div></td>
                                    <td><div class="text-capitalize">{{ $candidate->gender }}</div></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Date of Birth</strong></div></td>
                                    <td>{{ $candidate->dob }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Marital Status</strong></div></td>
                                    <td><div class="text-capitalize">{{ $candidate->marital_status }}</div></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Address</strong></div></td>
                                    <td><address>{{ $candidate->address }}</address></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Phone Number</strong></div></td>
                                    <td>{{ $candidate->phone_number }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Mobile Number</strong></div></td>
                                    <td>{{ $candidate->mobile_number }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>E-mail Address</strong></div></td>
                                    <td>{{ $candidate->email }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>CV</strong></div></td>
                                    <td><a href="#">CV.pdf</a></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Certificates</strong></div></td>
                                    <td><a href="#">Certificates.pdf</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">

                    {!! Form::open([
                        'route' => ['candidate.destroy', $candidate->id],
                        'method' => 'delete',
                        'class' => 'form-horizontal'
                    ]) !!}

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
