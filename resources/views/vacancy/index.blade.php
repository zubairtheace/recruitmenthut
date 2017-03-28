@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vacancies
                    <a href="{{ route('vacancy.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Closing Date</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vacancies as $vacancy)
                            <tr>
                                <td>{{ $vacancy->name }}</td>
                                <td>{{ $vacancy->closing_date }}</td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('vacancy.show', $vacancy->id) }}"><span class="fa fa-eye"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="{{ route('vacancy.edit', $vacancy->id) }}"><span class="fa fa-pencil"></span></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Vacancies </td>
                            </tr>
                            @endforelse
                        </tbody>
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
