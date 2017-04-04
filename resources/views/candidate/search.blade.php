@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading"> Search Candidates

                    <a href="{{ route('candidate.index') }}" class="btn btn-primary btn-sm pull-right"> Back to Candidates page </a>
                </div>
                <div class="panel-body text-center">
                    <h3>Search results for <b>"{!! $searchTerm !!}"</b></h3>
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
                    <div class="pull-right">
                        {{ $candidates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
