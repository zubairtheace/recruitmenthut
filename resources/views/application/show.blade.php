@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/application">Applications</a> <span class="fa fa-chevron-right"></span> Application # {{ $application->id }}
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    <a href="{{ route('application.edit', $application->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
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
                                    <th><div class="text-right">Application</th>
                                    <th>#{{ $application->id }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><div class="text-right"><strong>Candidate Name</strong></div></td>
                                    <td><a href="{{ route('candidate.show', $application->candidate->id) }}">{{ $application->candidate->first_name }} {{ $application->candidate->last_name }}</a></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Job Title</strong></div></td>
                                    <td><a href="{{ route('vacancy.show', $application->vacancy->id) }}">{{ $application->vacancy->name }}</a></td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Date of Application</strong></div></td>
                                    <td>{{ $application->date_applied }}</td>
                                </tr>

                                <tr>
                                    <td><div class="text-right"><strong>Vacancy Closing Date</strong></div></td>
                                    <td>{{ $application->vacancy->closing_date }}</td>
                                </tr>

                                <?php
                                    if (Auth::guest() != true){
                                        if (Auth::user()->user_type_id == 4){
                                            ?>
                                                <tr>
                                                    <td><div class="text-right"><strong>Interviews</strong></div></td>
                                                    <td>
                                                        <a href="/candidate-interview/{{$application->id}}">{{ DB::table('interviews')->where('application_id', $application->id)->count() }} Interviews</a>

                                                        <a href="/interview/create/{{$application->id}}" class="btn btn-primary btn-sm ">Add Interview </a>

                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                 ?>

                                <?php
                                    if (Auth::guest() != true){
                                        if (Auth::user()->user_type_id == 4){
                                            ?>
                                                <tr>
                                                    <td><div class="text-right"><strong>Overall Rating</strong></div></td>
                                                    <?php $avg = DB::table('interviews')->where('application_id', $application->id)->where('status', '=', 'Done')->avg('rating'); ?>
                                                    <td>{{ round($avg,2) }}/10</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    if (Auth::guest() != true){
                        if (Auth::user()->user_type_id == 4){
                            ?>
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
                            <?php
                        }
                    }
                 ?>
            </div>
        </div>
    </div>
</div>
@endsection
