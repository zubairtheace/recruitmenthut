@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/vacancy">Vacancies</a> <span class="fa fa-chevron-right"></span> {{ $vacancy->name }}
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                                <?php
                            }
                        }
                     ?>
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
                        if (Auth::guest() != false){
                            ?>
                                <a href="/login" class="btn btn-primary">Login to Apply </a>
                            <?php
                        }
                     ?>
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 1){
                                ?>
                                {!! Form::open([
                                    'route' => ['application.store'],
                                    'method' => 'POST',
                                    'class' => 'form-horizontal'
                                ]) !!}
                                    <input name="candidate_id" type="hidden" value="{{ Auth::id() }}">
                                    <input name="vacancy_id" type="hidden" value="{{ $vacancy->id }}">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                {!! Form::close() !!}
                                <?php
                            }
                        }
                     ?>
                    <?php
                        if (Auth::guest() != true){
                            if (Auth::user()->user_type_id == 4){
                                ?>
                                    {!! Form::open([
                                        'route' => ['vacancy.destroy', $vacancy->id],
                                        'method' => 'delete',
                                        'class' => 'form-horizontal'
                                    ]) !!}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    {!! Form::close() !!}
                                <?php
                            }
                        }
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
