@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/vacancy">Vacancies</a> <span class="fa fa-chevron-right"></span> {{ $vacancy->name }}
                    <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>{{ $vacancy->name }}</th>
                                <tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $vacancy->description }}</td>
                                </tr>

                                <tr>
                                    <td>Closing Date</td>
                                    <td>{{ $vacancy->closing_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <?php
                        if (session('user_type') == 1){
                            ?>
                            My user type is 1
                            <?php
                        }
                     ?>
                    {!! Form::open([
                        'route' => ['application.store'],
                        'method' => 'POST',
                        'class' => 'form-horizontal'
                    ]) !!}
                        <input name="candidate_id" type="hidden" value="{{ Auth::id() }}">
                        <input name="vacancy_id" type="hidden" value="{{ $vacancy->id }}">
                    <button type="submit" class="btn btn-primary">
                        Apply
                    </button>

                    {!! Form::close() !!}
                    <!-- <a href="{{ route('application.create') }}" class="btn btn-primary">Apply</a> -->
                    {!! Form::open([
                        'route' => ['vacancy.destroy', $vacancy->id],
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
