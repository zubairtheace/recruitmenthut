@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recruiters</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Recruiter Type</th>
                                <th>Position</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Isabelle Ballesteros</td>
                                <td>Interviewer</td>
                                <td>UX DESIGNER</td>
                            </tr>

                            <tr>
                                <td>Reagan Huling</td>
                                <td>HR</td>
                                <td>UI DESIGNER</td>
                            </tr>

                            <tr>
                                <td>Jayson Noll</td>
                                <td>Interviewer</td>
                                <td>FRONT-END DESIGNER</td>
                            </tr>

                            <tr>
                                <td>Harold Rothermel</td>
                                <td>HR</td>
                                <td>FRONT-END DEVELOPER</td>
                            </tr>

                            <tr>
                                <td>Ana Dicarlo</td>
                                <td>Interviewer</td>
                                <td>Backend Developper</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
