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
                    <div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th><div class="text-right">Candidate</th>
                                    <th>{{ $candidate->user_type }}</th>
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
