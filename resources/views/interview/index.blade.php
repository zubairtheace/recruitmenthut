@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interviews
                    <a href="{{ route('interview.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Interviewer</th>
                                <th>Job Applied</th>
                                <th>Interview Format</th>
                                <th>Interview Date / Time</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interviews as $interview)
                            <tr>
                                <td>{{ $interview->application_id }}</td><!-- <td>Candidate first_name last_name</td> -->
                                <td>Mr. Interviewer</td><!-- <td>Interviewer first_name last_name</td> -->
                                <td>Job Title</td><!-- <td>Vacancy name</td> -->
                                <td>{{ $interview->interview_type_id }}</td><!-- <td>Interview_type name</td> -->
                                <td>{{ $interview->scheduled_on }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('interview.show', $interview->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('interview.edit', $interview->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No Interviews </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $interviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
