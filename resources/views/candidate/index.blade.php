@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Candidates
                    <!-- <a href="{{ route('candidate.create') }}" class="btn btn-primary btn-sm pull-right">Add </a> -->
                </div>
                <div class="panel-body text-center">
                    <form>
                        <input type="text" name="search" placeholder="Search..">
                    </form>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Candidate Last Name</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidates as $candidate)
                            <tr>
                                <td><a href="{{ route('candidate.show', $candidate->id) }}"><div>{{ $candidate->first_name }}</div></a></td>
                                <td><a href="{{ route('candidate.show', $candidate->id) }}"><div>{{ $candidate->last_name }}</div></a></td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('candidate.edit', $candidate->id) }}"><span class="fa fa-pencil"></span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Candidates</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
