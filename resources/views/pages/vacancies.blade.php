@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vacancies</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Job Title</th>

                                <th>Closing Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>PLSQL Developer</td>
                                <td>03/03/2017</td>
                            </tr>
                            <tr>
                                <td>Implementation Consultant Assoc</td>
                                <td>31/03/2017</td>
                            </tr>
                            <tr>
                                <td>Release Manager - Specialist In Source Control </td>
                                <td>26/04/2017</td>
                            </tr>
                            <tr>
                                <td>QA/Test Analyst</td>
                                <td>26/04/2017</td>
                            </tr>
                            <tr>
                                <td>Senior Officer- Postpaid</td>
                                <td>07/04/2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
