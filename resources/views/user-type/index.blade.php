@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Type
                    <a href="{{ route('user-type.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        @forelse($userTypes as $userType)
                        <tr>
                            <td>
                                <b>name:</b> {{$userType->name}}
                                <div class="btn-toolbar pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('user-type.show', $userType->id) }}" class="btn btn-primary btn-sm">View </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('user-type.edit', $userType->id) }}" class="btn btn-primary btn-sm">Edit </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No User Types </td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        {{ $userTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
