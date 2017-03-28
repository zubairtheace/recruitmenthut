@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications
                    <a href="{{ route('application.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate ID</th>
                                <th>Job ID</th>
                                <th>Date Applied</th>
                                <th>Closing</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                            <tr>
                                <td>{{ $application->candidate_id }}</td><!-- <td>Candidate first_name last_name</td> -->
                                <td>{{ $application->vacancy_id }}</td><!-- <td>vacancy name</td> -->
                                <td>{{ $application->date_applied }}</td>
                                <td>30 March 2017</td><!-- <td>vacancy closing_date</td> -->
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('application.show', $application->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('application.edit', $application->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Applications </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
