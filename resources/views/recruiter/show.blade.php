@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/recruiter">Recruiters</a> <span class="fa fa-chevron-right"></span> {{ $recruiter->first_name }} {{ $recruiter->last_name }}
                    <a href="{{ route('recruiter.edit', $recruiter->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th><div class="text-right">Recruiter Type</th>
                                    <th>{{ $recruiter->user_type }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><div class="text-right"><strong>First Name</strong></div></td>
                                    <td>{{ $recruiter->first_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Last Name</strong></div></td>
                                    <td>{{ $recruiter->last_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Position</strong></div></td>
                                    <td>{{ $recruiter->position }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>National Identity Card Number</strong></div></td>
                                    <td>{{ $recruiter->nic }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Gender</strong></div></td>
                                    <td><div class="text-capitalize">{{ $recruiter->gender }}</div></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Date of Birth</strong></div></td>
                                    <td>{{ $recruiter->dob }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Marital Status</strong></div></td>
                                    <td><div class="text-capitalize">{{ $recruiter->marital_status }}</div></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Address</strong></div></td>
                                    <td><address>{{ $recruiter->address }}</address></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Phone Number</strong></div></td>
                                    <td>{{ $recruiter->phone_number }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Mobile Number</strong></div></td>
                                    <td>{{ $recruiter->mobile_number }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>E-mail Address</strong></div></td>
                                    <td>{{ $recruiter->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">

                    {!! Form::open([
                        'route' => ['recruiter.destroy', $recruiter->id],
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
