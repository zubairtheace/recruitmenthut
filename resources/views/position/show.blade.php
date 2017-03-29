@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/position">Positions</a> <span class="fa fa-chevron-right"></span> {{ $position->name }}
                    <a href="{{ route('position.edit', $position->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Name</td>
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
