@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Departments
                    <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                  <div>
                    <b>name:</b> {{$department->name}}
                  </div>
                </div>
                <div class="panel-footer">
                    {!! Form::open([
                      'route' => ['department.destroy', $department->id],
                      'method' => 'delete',
                      'class' => 'form-horizontal'
                    ]) !!}

                      <button type="submit" class="btn btn-danger">
                          Delete
                      </button>
                  </form>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
