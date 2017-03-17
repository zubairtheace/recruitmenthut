@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vacancy
                  <a href="{{ route('vacancy.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                  <table class="table">
                    @forelse($vacancies as $vacancy)
                      <tr>
                        <td>
                          <p><b>Vacancy:</b> {{$vacancy->name}}</p>
                          <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                              <a href="{{ route('vacancy.show', $vacancy->id) }}" class="btn btn-primary btn-sm">View </a>
                            </div>
                            <div class="btn-group">
                              <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="btn btn-primary btn-sm">Edit </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty
                    <tr>
                      <td>No Vacancies </td>
                    </tr>
                    @endforelse
                    </table>
                    <div>
                        {{ $vacancies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
