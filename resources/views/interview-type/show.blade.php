@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/interview-type">InterviewTypes</a> <span class="fa fa-chevron-right"></span> {{ $interviewType->name }}
                    <a href="{{ route('interview-type.edit', $interviewType->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Interview Type</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $interviewType->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::open([
                        'route' => ['interview-type.destroy', $interviewType->id],
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
