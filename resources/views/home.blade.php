
<html>
<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script type="text/javascript" charset="utf8" src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
			
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">

		<script type="text/javascript" charset="utf8" src="{{asset('DataTables/DataTables-1.10.18/js/jquery.dataTables.js')}}"></script>
		<script type="text/javascript" charset="utf8" src="{{asset('DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
		<script type="text/javascript" charset="utf8" src="{{asset('js/popper.min.js')}}" ></script>
		<script type="text/javascript" charset="utf8" src="{{asset('js/bootstrap.min.js')}}" ></script>

		<script>
		
			$('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
				$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
			} );
		 
			$(document).ready(function() {
				$('#myTable').DataTable();
			} );
/*
			$(document).ready(function() {
				$('#myTable2').DataTable();
			} );
*/
		</script>
	</head>
    <body>
        <table id="myTable" class="table table-striped table-bordered" style="width:80%; font-size:18px;">
            <thead style="position:sticky; top:0px; border-collapse:collapsed; background:#fff;">
                <th>Treść</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
            @for ($i = 0; $i < 100; $i++)
                <tr>
                    <td>tresc zadania{{$i}}</td>
                    <td><input type="checkbox" name="status" value="" style="font-color:red;"></td>
                    <td>
                        <button id="done" class="btn btn-outline-primary" style="margin:10px;">Done</button>
                        <button id="delete" class="btn btn-outline-primary" style="margin:10px;">Delete</button>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </body>
</html>