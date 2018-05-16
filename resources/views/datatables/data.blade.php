@extends('layouts.master')


@section('style')


@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data Table Demo</div>

                <div class="panel-body">
                    <table class="table table-hover table-bordered table-striped datatable" id="users-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<script type="text/javascript">
 $(document).ready(function() {
    $('#users-table').dataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "datatable/getdata",
            "type": "POST",
            "data": {_token: "{{csrf_token()}}"}
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" }
            
        ]
    } );
} );
 </script>
@endsection