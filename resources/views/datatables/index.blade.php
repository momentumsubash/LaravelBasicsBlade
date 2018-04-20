

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
<table class="table table-bordered datatable" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>


    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('.datatable').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: 'datatable/getdata',
        //         columns: [
        //             {data: 'id', name: 'id'},
        //             {data: 'name', name: 'name'},
        //             {data: 'email', name: 'email'},
        //         ]
        //     });
        // });


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

</body>
           <!--  <script type="text/javascript">
$(document).ready(function () {
            $('#users-table').DataTable({
                "paging": true, // Allow data to be paged
                "lengthChange": false,
                "searching": true, // Search box and search function will be actived
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "processing": true,  // Show processing
                "serverSide": true,  // Server side processing
                "deferLoading": 0, // In this case we want the table load on request so initial automatical load is not desired
                // "pageLength": 10,    // 5 rows per page
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "created_at"},
                    {"data": "updated_at"}
                   

                ],
                "columnDefs": [{
                    "targets": [1],
                    "orderable": false
                },],
                "ajax": {
                    "url": "{{url('getuser')}}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
            });
</script> -->

</html>