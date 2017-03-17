@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Vacancy</div>
                <div class="panel-body">
                    {!! Form::open([
                            'route' => ['vacancy.update', $vacancy->id],
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'method' => 'PUT'
                            ]) !!}

                            <!-- vacancy name   -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="container-fluid">
                                    {!! Form::label(
                                        'name',
                                        'Name',
                                        [
                                            'class' => 'col-md-4 control-label'
                                        ]
                                    ); !!}

                                    <div class="col-md-6">
                                        {!! Form::text(
                                            'name',
                                            $vacancy->name,
                                            [
                                                'class'=>'form-control',
                                                'required' => 'required'
                                            ]
                                        ); !!}
                                    </div>
                                </div>
                                @if ($errors->has('name'))
                                <div class="container-fluid">
                                    <div class="col-md-8 col-md-offset-4">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- department id -->

                            <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                                <div class="container-fluid">
                                    {!! Form::label(
                                        'department_id',
                                        'Department',
                                        [
                                            'class' => 'col-md-4 control-label'
                                        ]
                                    ); !!}

                                    <div class="col-md-6">
                                        {!! Form::select(
                                            'department_id',
                                            App\Department::pluck('name', 'id'),
                                            $vacancy->department_id,
                                            [
                                                'placeholder' => 'Select department...',
                                                'class' => 'form-control'
                                            ]
                                        ); !!}
                                    </div>
                                </div>
                                @if ($errors->has('department_id'))
                                <div class="container-fluid">
                                    <div class="col-md-8 col-md-offset-4">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- valid to -->
                            <div class="form-group{{ $errors->has('valid_to') ? ' has-error' : '' }}">
                                <div class="container-fluid">
                                    {!! Form::label(
                                        'valid_to',
                                        'Valid To',
                                        [
                                            'class' => 'col-md-4 control-label'
                                        ]
                                    ); !!}

                                    <div class="col-md-4">
                                        {!! Form::date(
                                            'valid_to',
                                            $vacancy->valid_to,
                                            [
                                                'class'=>'form-control',
                                            ]
                                        ); !!}
                                    </div>
                                </div>
                                @if ($errors->has('valid_to'))
                                <div class="container-fluid">
                                    <div class="col-md-8 col-md-offset-4">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('valid_to') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- description -->
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <div class="container-fluid">
                                    {!! Form::label(
                                        'description',
                                        'Description',
                                        [
                                            'class' => 'col-md-4 control-label'
                                        ]
                                    ); !!}

                                    <div class="col-md-6">
                                        {!! Form::textarea(
                                            'description',
                                            $vacancy->description,
                                            [
                                                'class'=>'form-control',
                                                'required' => 'required',
                                                'rows' => '5'
                                            ]
                                        ); !!}
                                    </div>
                                </div>
                                @if ($errors->has('description'))
                                <div class="container-fluid">
                                    <div class="col-md-8 col-md-offset-4">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- submit -->

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit(
                                        'Save',
                                        [
                                            'class' => 'btn btn-primary'
                                        ]
                                    ); !!}

                                </div>
                            </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
