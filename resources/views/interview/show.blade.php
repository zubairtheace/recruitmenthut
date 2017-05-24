@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/interview">Interviews</a> <span class="fa fa-chevron-right"></span> Interview # {{ $interview->id }}
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    <a href="{{ route('interview.edit', $interview->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                                    <!-- <a href="{{ route('interview.conduct', $interview->id) }}" class="btn btn-secondary btn-sm pull-right">Conduct Interview </a> -->
                                <?php
                            }
                        }
                     ?>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="text-right">Interview</th>
                                    <th>#{{ $interview->id }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><div class="text-right"><strong>Candidate Name</strong></div></td>
                                    <td>{{ $interview->application->candidate->first_name }} {{ $interview->application->candidate->last_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Interviewer Name</strong></div></td>
                                    <td>{{ $interview->interviewer->first_name }} {{ $interview->interviewer->last_name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Job Title</strong></div></td>
                                    <td><a href="{{ route('vacancy.show', $interview->application->vacancy->id) }}">{{ $interview->application->vacancy->name }}</a></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Vacancy closing date</strong></div></td>
                                    <?php
                                        $closingDate = new DateTime($interview->application->vacancy->closing_date);
                                     ?>
                                    <td>{{ $closingDate->format('d-m-Y') }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Interview Format</strong></div></td>
                                    <td>{{ $interview->interviewType->name }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Interview Date/Time</strong></div></td>
                                    <?php
                                        $scheduledOn = new DateTime($interview->scheduled_on);
                                     ?>
                                    <td>{{ $scheduledOn->format('g:ia \o\n l jS F Y') }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Interview Status</strong></div></td>
                                    <td>
                                        {{ $interview->status }}
                                        &nbsp;
                                        &nbsp;
                                        <?php
                                            if ($interview->status == 'Pending'){
                                                ?>
                                                    <a href="{{ route('interview.conduct', $interview->id) }}" class="btn btn-primary btn-sm">Conduct Interview</a>
                                                <?php
                                            }
                                         ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Notes</strong></div></td>
                                    <td>{{ $interview->notes }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Rating</strong></div></td>
                                    <td>{{ $interview->rating }}/10</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Average Rating</strong></div></td>
                                    <?php $avg = DB::table('interviews')->where('application_id', $interview->application_id)->avg('rating'); ?>
                                    <td>{{ round($avg,2) }}/10</td>
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
