@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Interview for {{ App\User::find($application_id)->first_name }} {{ App\User::find($application_id)->last_name }}</div>
                <div class="panel-body">

                    {!! Form::open([
                      'route' => 'interview.store',
                      'class' => 'form-horizontal',
                      'role' => 'form',
                      'method' => 'POST',
                      ]) !!}

                        
                        <!-- Application id   -->
                        <input name="application_id" type="hidden" value="{{ $application_id }}">


                        <!-- Interviewer id   -->
                        <div class="form-group{{ $errors->has('interviewer_id') ? ' has-error' : '' }}">
                            <div class="container-fluid">
                                {!! Form::label(
                                    'interviewer_id',
                                    'Interviewer',
                                    [
                                        'class' => 'col-md-4 control-label'
                                    ]
                                ); !!}

                                <div class="col-md-6">
                                    {!! Form::select(
                                        'interviewer_id',
                                        App\User::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->whereNotIn('user_type_id', [1,2])->pluck('name', 'id'),
                                        null,
                                        [
                                            'placeholder' => 'Select Interviewer...',
                                            'class' => 'form-control'
                                        ]
                                    ); !!}
                                </div>
                            </div>
                            @if ($errors->has('interviewer_id'))
                            <div class="container-fluid">
                                <div class="col-md-8 col-md-offset-4">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interviewer_id') }}</strong>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Interview Type id   -->
                        <div class="form-group{{ $errors->has('interview_type_id') ? ' has-error' : '' }}">
                            <div class="container-fluid">
                                {!! Form::label(
                                    'interview_type_id',
                                    'Interview Type',
                                    [
                                        'class' => 'col-md-4 control-label'
                                    ]
                                ); !!}

                                <div class="col-md-6">
                                    {!! Form::select(
                                        'interview_type_id',
                                        App\InterviewType::pluck('name', 'id'),
                                        null,
                                        [
                                            'placeholder' => 'Select Interview Type...',
                                            'class' => 'form-control'
                                        ]
                                    ); !!}
                                </div>
                            </div>
                            @if ($errors->has('interview_type_id'))
                            <div class="container-fluid">
                                <div class="col-md-8 col-md-offset-4">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interview_type_id') }}</strong>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!--Scheduled on-->
                        <div class="form-group{{ $errors->has('scheduled_on') ? ' has-error' : '' }}">
                          <div class="container-fluid">
                              {!! Form::label(
                                  'scheduled_on',
                                  'Date and Time of Interview',
                                  [
                                      'class' => 'col-md-4 control-label'
                                  ]
                              ); !!}

                              <div class="col-md-5">
                              {!! Form::text(
                                  'scheduled_on',
                                  old('scheduled_on'),
                                  [
                                      'class'=>'form-control',
                                      'id'=>'datetimepicker1'
                                  ]
                              ); !!}

                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                      format: 'YYYY/MM/DD HH:mm',
                                      sideBySide: true
                                    });
                                });
                            </script>

                          </div>


                          </div>
                          @if ($errors->has('scheduled_on'))
                          <div class="container-fluid">
                              <div class="col-md-8 col-md-offset-4">
                                  <span class="help-block">
                                      <strong>{{ $errors->first('scheduled_on') }}</strong>
                                  </span>
                              </div>
                          </div>
                          @endif
                        </div>

                        <!--Notes-->
                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }} {{ (Request::segment(2) == 'create')?'hide':'show' }}">
                            <div class="container-fluid">
                                {!! Form::label(
                                    'notes',
                                    'Interview Notes',
                                    [
                                        'class' => 'col-md-4 control-label'
                                    ]
                                ); !!}

                                <div class="col-md-6">
                                    {!! Form::textarea(
                                        'notes',
                                        old('notes'),
                                        [
                                            'class'=>'form-control',
                                            'rows' => '5'
                                        ]
                                    ); !!}
                                </div>
                            </div>
                            @if ($errors->has('notes'))
                            <div class="container-fluid">
                                <div class="col-md-8 col-md-offset-4">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!--Rating-->
                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }} {{ (Request::segment(2) == 'create')?'hide':'show' }}">
                            <div class="container-fluid">
                                {!! Form::label(
                                    'rating',
                                    'Rating of Interview',
                                    [
                                        'class' => 'col-md-4 control-label'
                                    ]
                                ); !!}

                                <div class="col-md-3">
                                    <div class="input-group">
                                        {!! Form::number(
                                            'rating',
                                            (null !==old('rating'))?old('rating'):'0',
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
                            @if ($errors->has('rating'))
                            <div class="container-fluid">
                                <div class="col-md-8 col-md-offset-4">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rating') }}</strong>
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
