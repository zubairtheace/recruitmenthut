@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vacancies
                    <?php
                        if (Auth::user()->user_type_id == 4){
                            ?>
                                <a href="{{ route('vacancy.create') }}" class="btn btn-primary btn-sm pull-right">Add </a>
                            <?php
                        }
                     ?>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Closing Date</th>
                                <?php
                                    if (Auth::user()->user_type_id == 4){
                                        ?>
                                            <th><div class="pull-right">Actions</div></th>
                                        <?php
                                    }
                                 ?>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vacancies as $vacancy)
                            <tr>
                                <td><a href="{{ route('vacancy.show', $vacancy->id) }}"><div>{{ $vacancy->name }}</div></a></td>
                                <td>{{ $vacancy->closing_date }}</td>
                                <?php
                                    if (Auth::user()->user_type_id == 4){
                                        ?>
                                        <td>
                                            <div class="pull-right">
                                            <a href="{{ route('vacancy.edit', $vacancy->id) }}"><span class="fa fa-pencil"></span></a>
                                            </div>
                                        </td>
                                        <?php
                                    }
                                 ?>
                            </tr>
                            @empty
                            <tr>
                                <td>No Vacancies </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
