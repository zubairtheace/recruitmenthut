@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/position">Positions</a> <span class="fa fa-chevron-right"></span> {{ $position->name }}
                    <a href="{{ route('position.edit', $position->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="text-right">Position</th>
                                    <th>#{{ $position->id }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><div class="text-right">Name</td>
                                    <td>{{ $position->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">

                    {!! Form::open([
                        'route' => ['position.destroy', $position->id],
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
