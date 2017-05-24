@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Interview</div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => ['interview.update', $interview->id],
                        'class' => 'form-horizontal',
                        'role' => 'form',
                        'method' => 'put'
                    ]) !!}

                    @if(Request::segment(3) == 'conduct')
                      <input type="hidden" name="application_id" value="{{$interview->application_id}}">
                      <input type="hidden" name="interviewer_id" value="{{$interview->interviewer_id}}">
                      <input type="hidden" name="interview_type_id" value="{{$interview->interview_type_id}}">
                      <input type="hidden" name="scheduled_on" value="{{$interview->scheduled_on}}">
                      <input type="hidden" name="status" value="Done">

                    @else

                      <!-- Application id   -->
                      <div class="form-group{{ $errors->has('application_id') ? ' has-error' : '' }}">
                          <div class="container-fluid">
                              {!! Form::label(
                                  'application_id',
                                  'Application',
                                  [
                                      'class' => 'col-md-4 control-label'
                                  ]
                              ); !!}

                              <div class="col-md-6">
                                  {!! Form::select(
                                      'application_id',
                                      App\Application::pluck('candidate_id', 'id'),
                                      $interview->application_id,
                                      [
                                          'placeholder' => 'Select Application...',
                                          'class' => 'form-control'
                                      ]
                                  ); !!}
                              </div>
                          </div>
                          @if ($errors->has('application_id'))
                          <div class="container-fluid">
                              <div class="col-md-8 col-md-offset-4">
                                  <span class="help-block">
                                      <strong>{{ $errors->first('application_id') }}</strong>
                                  </span>
                              </div>
                          </div>
                          @endif
                      </div>

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
                                      App\User::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')->pluck('name', 'id'),
                                      $interview->interviewer_id,
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
                                      $interview->interview_type_id,
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

                          <div class="col-md-4">
                              {!! Form::text(
                                  'scheduled_on',
                                  $interview->scheduled_on,
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

                    @endif
                    <!--Notes-->
                    <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
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
                                    $interview->notes,
                                    [
                                        'class'=>'form-control',
                                        'required' => 'required',
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
                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
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
                                        $interview->rating,
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
