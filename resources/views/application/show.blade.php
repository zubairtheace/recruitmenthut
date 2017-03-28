@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/application">Applications</a> <span class="fa fa-chevron-right"></span> Application # {{ $application->id }}
                    <a href="{{ route('application.edit', $application->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Application Number</th>
                                    <th>{{ $application->id }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Candidate Name</td>
                                    <td>{{ $application->candidate_id }}</td>
                                    <td><button class="btn btn-priamary btn-sm">View Candidate Details</button></td>
                                </tr>

                                <tr>
                                    <td>Job Title</td>
                                    <td>{{ $application->vacancy_id }}</td>
                                    <td><button class="btn btn-priamary btn-sm">View Job Details</button></td>
                                </tr>

                                <tr>
                                    <td>Date of Application</td>
                                    <td>{{ $application->date_applied }}</td>
                                </tr>

                                <tr>
                                    <td>Vacancy Closing Date</td>
                                    <td>30 March 2017</td>
                                </tr>

                                <tr>
                                    <td>Overall Rating</td>
                                    <td>{{ $application->overall_rating }}/10</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">

                    {!! Form::open([
                        'route' => ['application.destroy', $application->id],
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
