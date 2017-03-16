@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Position</div>
                <div class="panel-body">

                    {!! Form::open([
                      'route' => 'position.store',
                      'class' => 'form-horizontal',
                      'role' => 'form',
                      'method' => 'POST',
                      ]) !!}

                    <!-- position name   -->
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
                                    old('name'),
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
                                    null,
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
