@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    <!-- <a href="{{ route('application.create') }}" class="btn btn-primary btn-sm pull-right">Add </a> -->
                                <?php
                            }
                        }
                     ?>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <?php
                                    if (Auth::guest() != true){
                                        if (Auth::user()->user_type_id == 4){
                                            ?>
                                                <th>Candidate Name</th>
                                            <?php
                                        }
                                    }
                                 ?>
                                <th>Job ID</th>
                                <th>Date Applied</th>
                                <th>Closing</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                            <tr>
                                <?php
                                    if (Auth::guest() != true){
                                        if (Auth::user()->user_type_id == 4){
                                            ?>
                                                <td>{{ $application->candidate->first_name }} {{ $application->candidate->last_name }}</td>
                                            <?php
                                        }
                                    }
                                 ?>
                                <td>{{ $application->vacancy->name }}</td>
                                <?php
                                    $dateApplied = new DateTime($application->date_applied);
                                    $closingDate = new DateTime($application->vacancy->closing_date);
                                 ?>
                                <td>{{ $dateApplied->format('d-m-Y') }}</td>
                                <td>{{ $closingDate->format('d-m-Y') }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('application.show', $application->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <?php
                                        if (Auth::guest() != true){
                                            if (Auth::user()->user_type_id == 4){
                                                ?>
                                                    <a href="{{ route('application.edit', $application->id) }}"><span class="fa fa-pencil"></span></a>
                                                <?php
                                            }
                                        }
                                     ?>

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
