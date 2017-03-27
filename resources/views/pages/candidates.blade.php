@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Candidates</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Isabelle</td>
                                <td>Ballesteros</td>
                            </tr>

                            <tr>
                                <td>Reagan</td>
                                <td>Huling</td>
                            </tr>

                            <tr>
                                <td>Jayson</td>
                                <td>Noll</td>
                            </tr>

                            <tr>
                                <td>Harold</td>
                                <td>Rothermel</td>
                            </tr>

                            <tr>
                                <td>Ana</td>
                                <td>Dicarlo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
