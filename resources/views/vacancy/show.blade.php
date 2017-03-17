@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vacancy
                    <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="btn btn-primary btn-sm pull-right">Edit </a>
                </div>
                <div class="panel-body">
                  <div>
                    <p><b>Vacancy:</b> {{$vacancy->name}}</p>
                  </div>
                </div>
                <div class="panel-footer">
                  {!! Form::open(['route' => ['vacancy.destroy', $vacancy->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
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
