@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Interview Types</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>Face to Face</td>
                            </tr>

                            <tr>
                                <td>Call</td>
                            </tr>

                            <tr>
                                <td>Video Call</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
