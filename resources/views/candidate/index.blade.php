@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 custom-padding">
            <div class="panel panel-default">
                <div class="panel-heading">Candidates
                    <!-- <a href="{{ route('candidate.create') }}" class="btn btn-primary btn-sm pull-right">Add </a> -->
                </div>
                <div class="search panel-body text-center">
                    <form>
                        {!! Form::open([
                                'url' => 'candidate/search',
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'method' => 'POST'
                                ]) !!}
                            <input type="text" name="search" placeholder="Search Candidates...">
                        {!! Form::close() !!}
                    </form>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Candidate Last Name</th>
                                <th><div class="pull-right">Actions</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidates as $candidate)
                            <tr>
                                <td><a href="{{ route('candidate.show', $candidate->id) }}"><div>{{ $candidate->first_name }}</div></a></td>
                                <td><a href="{{ route('candidate.show', $candidate->id) }}"><div>{{ $candidate->last_name }}</div></a></td>
                                <td>
                                    <div class="pull-right">
                                    <a href="{{ route('candidate.edit', $candidate->id) }}"><span class="fa fa-pencil"></span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Candidates</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $candidates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
