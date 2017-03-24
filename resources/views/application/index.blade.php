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
                    <table class="table">
                        @forelse($applications as $application)
                        <tr>
                            <td>
                                <p><b>candidate_id:</b> {{$application->candidate_id}}</p>
                                <div class="btn-toolbar pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('application.show', $application->id) }}" class="btn btn-primary btn-sm">View </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('application.edit', $application->id) }}" class="btn btn-primary btn-sm">Edit </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Applications </td>
                        </tr>
                        @endforelse
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
