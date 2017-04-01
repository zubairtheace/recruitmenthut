@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Application</div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => ['application.update', $application->id],
                        'class' => 'form-horizontal',
                        'role' => 'form',
                        'method' => 'put'
                    ]) !!}

                    <!-- candidate id   -->
                    <div class="form-group{{ $errors->has('candidate_id') ? ' has-error' : '' }}">
                        <div class="container-fluid">
                            {!! Form::label(
                                'candidate_id',
                                'Candidate',
                                [
                                    'class' => 'col-md-4 control-label'
                                ]
                            ); !!}

                            <div class="col-md-6">
                                {!! Form::select(
                                    'candidate_id',
                                    App\User::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name', 'id'),
                                    $application->candidate_id,
                                    [
                                        'placeholder' => 'Select Candidate...',
                                        'class' => 'form-control',
                                        'disabled' => 'disabled'
                                    ]
                                ); !!}
                            </div>
                        </div>
                        @if ($errors->has('candidate_id'))
                        <div class="container-fluid">
                            <div class="col-md-8 col-md-offset-4">
                                <span class="help-block">
                                    <strong>{{ $errors->first('candidate_id') }}</strong>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Vacancy id   -->
                    <div class="form-group{{ $errors->has('vacancy_id') ? ' has-error' : '' }}">
                        <div class="container-fluid">
                            {!! Form::label(
                                'vacancy_id',
                                'Vacancy',
                                [
                                    'class' => 'col-md-4 control-label'
                                ]
                            ); !!}

                            <div class="col-md-6">
                                {!! Form::select(
                                    'vacancy_id',
                                    App\Vacancy::pluck('name', 'id'),
                                    $application->vacancy_id,
                                    [
                                        'placeholder' => 'Select Vacancy...',
                                        'class' => 'form-control'
                                    ]
                                ); !!}
                            </div>
                        </div>
                        @if ($errors->has('vacancy_id'))
                        <div class="container-fluid">
                            <div class="col-md-8 col-md-offset-4">
                                <span class="help-block">
                                    <strong>{{ $errors->first('vacancy_id') }}</strong>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!--Date Applied-->
                    <div class="form-group{{ $errors->has('date_applied') ? ' has-error' : '' }}">
                      <div class="container-fluid">
                          {!! Form::label(
                              'date_applied',
                              'Date Applied',
                              [
                                  'class' => 'col-md-4 control-label'
                              ]
                          ); !!}

                          <div class="col-md-4">
                              {!! Form::date(
                                  'date_applied',
                                  $application->date_applied,
                                  [
                                      'class'=>'form-control',
                                  ]
                              ); !!}
                          </div>
                      </div>
                      @if ($errors->has('date_applied'))
                      <div class="container-fluid">
                          <div class="col-md-8 col-md-offset-4">
                              <span class="help-block">
                                  <strong>{{ $errors->first('date_applied') }}</strong>
                              </span>
                          </div>
                      </div>
                      @endif
                    </div>

                    <!--Overall Rating-->
                    <div class="form-group{{ $errors->has('overall_rating') ? ' has-error' : '' }}">
                        <div class="container-fluid">
                            {!! Form::label(
                                'overall_rating',
                                'Overall Rating',
                                [
                                    'class' => 'col-md-4 control-label'
                                ]
                            ); !!}

                            <div class="col-md-3">
                                <div class="input-group">
                                    {!! Form::number(
                                        'overall_rating',
                                        $application->overall_rating,
                                        [
                                            'class'=>'form-control',
                                            'step'=>'1',
                                            'min'=>'0',
                                            'max'=>'10',
                                            'required' => 'required'
                                        ]
                                    ); !!}
                                    <span class="input-group-addon" id="basic-addon2">/10</span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('overall_rating'))
                        <div class="container-fluid">
                            <div class="col-md-8 col-md-offset-4">
                                <span class="help-block">
                                    <strong>{{ $errors->first('overall_rating') }}</strong>
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- submit button -->
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
