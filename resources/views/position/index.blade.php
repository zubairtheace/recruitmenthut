@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading">Positions
                    <a href="{{ route('position.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($positions as $position)
                            <tr>
                                <td>{{ $position->name }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('position.show', $position->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('position.edit', $position->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Positions</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $positions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
