@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interview Types
                    <a href="{{ route('interview-type.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interviewTypes as $interviewType)
                            <tr>
                                <td>{{ $interviewType->name }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('interview-type.show', $interviewType->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('interview-type.edit', $interviewType->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Interview Types</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $interviewTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
