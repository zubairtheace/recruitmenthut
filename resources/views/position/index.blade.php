@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Position
                  <a href="{{ route('position.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                  <table class="table">
                    @forelse($positions as $position)
                      <tr>
                        <td>
                          <p><b>Position:</b> {{$position->name}}</p>
                          <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                              <a href="{{ route('position.show', $position->id) }}" class="btn btn-primary btn-sm">View </a>
                            </div>
                            <div class="btn-group">
                              <a href="{{ route('position.edit', $position->id) }}" class="btn btn-primary btn-sm">Edit </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty
                    <tr>
                      <td>No Positions </td>
                    </tr>
                    @endforelse
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
