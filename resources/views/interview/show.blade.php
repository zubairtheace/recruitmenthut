@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/application">Interviews</a> <span class="fa fa-chevron-right"></span> Interview # {{ $interview->id }}
                    <a href="{{ route('interview.edit', $interview->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Interview Number</th>
                                    <th>{{ $interview->id }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Candidate Name</td>
                                    <td>Paul Smith</td><!-- <td>candidate first_name last_name</td> -->
                                    <td><button class="btn btn-priamary btn-sm">View Candidate Details</button></td>
                                </tr>

                                <tr>
                                    <td>Job Title</td>
                                    <td>Human Resource Manager</td><!-- <td>vacancy name</td> -->
                                    <td><button class="btn btn-priamary btn-sm">View Job Details</button></td>
                                </tr>

                                <tr>
                                    <td>Interview Format</td>
                                    <td>Video Call</td><!-- <td>interview_type name</td> -->
                                </tr>

                                <tr>
                                    <td>Interview Date/Time</td>
                                    <td>{{ $interview->scheduled_on }}</td>
                                </tr>

                                <tr>
                                    <td>Notes</td>
                                    <td>{{ $interview->notes }}</td>
                                </tr>

                                <tr>
                                    <td>Overall Rating</td>
                                    <td>{{ $interview->rating }}/10</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">

                    {!! Form::open([
                        'route' => ['interview.destroy', $interview->id],
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
