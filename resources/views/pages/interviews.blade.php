@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Applications</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Job Applied</th>
                                <th>Interview Format</th>
                                <th>Interview Date / Time</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Isabelle Ballesteros</td>
                                <td>PLSQL Developer</td>
                                <td>Face to Face</td>
                                <td>03/03/2017 @ 13.00</td>
                            </tr>

                            <tr>
                                <td>Reagan Huling</td>
                                <td>Implementation Consultant Assoc</td>
                                <td>Call</td>
                                <td>31/03/2017 @ 13.00</td>
                            </tr>

                            <tr>
                                <td>Jayson Noll</td>
                                <td>Senior Officer- Postpaid</td>
                                <td>Face to Face</td>
                                <td>07/04/2017 @ 13.00</td>
                            </tr>

                            <tr>
                                <td>Harold Rothermel</td>
                                <td>Release Manager - Specialist In Source Control </td>
                                <td>Call</td>
                                <td>26/04/2017 @ 13.00</td>
                            </tr>

                            <tr>
                                <td>Ana Dicarlo</td>
                                <td>QA/Test Analyst</td>
                                <td>Face to Face</td>
                                <td>26/04/2017 @ 13.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
