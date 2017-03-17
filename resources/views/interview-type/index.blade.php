@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interview Type
                    <a href="{{ route('interview-type.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        @forelse($interviewTypes as $interviewType)
                        <tr>
                            <td>
                                <b>name:</b> {{$interviewType->name}}
                                <div class="btn-toolbar pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('interview-type.show', $interviewType->id) }}" class="btn btn-primary btn-sm">View </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('interview-type.edit', $interviewType->id) }}" class="btn btn-primary btn-sm">Edit </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Interview Types </td>
                        </tr>
                        @endforelse
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
