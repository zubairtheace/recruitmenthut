@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interviews
                    <a href="{{ route('interview.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        @forelse($interviews as $interview)
                        <tr>
                            <td>
                                <p><b>Application:</b> {{$interview->application_id}}</p>
                                <div class="btn-toolbar pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('interview.show', $interview->id) }}" class="btn btn-primary btn-sm">View </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('interview.edit', $interview->id) }}" class="btn btn-primary btn-sm">Edit </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Interviews </td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        {{ $interviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
