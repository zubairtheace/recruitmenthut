@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading">Interviews
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    <!-- <a href="{{ route('interview.create') }}" class="btn btn-primary btn-sm pull-right">Add </a> -->
                                <?php
                            }
                        }
                     ?>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Interviewer</th>
                                <th>Job Applied</th>
                                <th>Interview Format</th>
                                <th>Interview Status</th>
                                <th>Interview Date / Time</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interviews as $interview)
                            <tr>
                                <td>{{ $interview->application->candidate->first_name }} {{ $interview->application->candidate->last_name }}</td>
                                <td>{{ $interview->interviewer->first_name }} {{ $interview->interviewer->last_name }}</td><!-- <td>Candidate first_name last_name</td> -->
                                <td>{{ $interview->application->vacancy->name }}</td><!-- <td>Interviewer first_name last_name</td> -->
                                <td>{{ $interview->interviewType->name }}</td><!-- <td>Vacancy name</td> -->
                                <td>{{ $interview->status }}</td>
                                <?php
                                    $scheduledOn = new DateTime($interview->scheduled_on);
                                 ?>
                                <td>{{ $scheduledOn->format('Y-m-d') }} @ {{ $scheduledOn->format('H:i') }}</td>
                                <td>
                                    <div class="text-center">
                                    <a href="{{ route('interview.show', $interview->id) }}"><span class="fa fa-eye"></span></a>
                                    <!-- &nbsp;
                                    &nbsp;
                                    <?php
                                        if (Auth::guest() != true){
                                            if (Auth::user()->user_type_id == 4){
                                                ?>
                                                    <a href="{{ route('interview.edit', $interview->id) }}"><span class="fa fa-pencil"></span></a>
                                                <?php
                                            }
                                        }
                                     ?> -->
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
