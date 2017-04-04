@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recruiters
                    <a href="{{ route('recruiter.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Recruiter Name</th>
                                <th>Recruiter Type</th>
                                <th>Position</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recruiters as $recruiter)
                            <tr>
                                <td>{{ $recruiter->first_name }} {{ $recruiter->last_name }}</td>
                                <td>{{ $recruiter->user_type }}</td>
                                <td>{{ $recruiter->position }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('recruiter.show', $recruiter->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('recruiter.edit', $recruiter->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Recruiters / How the heck did u do that bro? </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $recruiters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
