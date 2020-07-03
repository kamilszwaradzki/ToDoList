
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
        
</script>

	</head>
    <body>
        <table id="myTable" class="table table-striped table-bordered" style="width:80%; font-size:18px;">
            <thead style="position:sticky; top:0px; border-collapse:collapsed; background:#fff;">
                <th>Id</th>
                <th>Content</th>
                <th>Status</th>
                <th>Control buttons</th>
            </thead>
            <tbody>
            @for ($i = 0; $i < 100; $i++)
                <tr id="row_{{$i}}">
                    <td>{{$i}}</td>
                    <td>Content of task</td>
                    <td><h5 id="status_{{$i}}"><img src="{{asset('icons/checked.png')}}"/> done</h5></td>
                    <td>
                        <input id="done" type="checkbox" checked="true" /><label for="done">&nbsp;done</label>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    <script>
        $("input").on('change', function() {

        var trid = $(event.target).closest('tr').attr('id'); // table row ID 

        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
            $("#"+trid.replace("row_","status_")).replaceWith("<h5 id='"+trid.replace("row_","status_")+"'><img src='/icons/checked.png'/> done</h5>");
        } else {
            $(this).attr('value', 'false');
            $("#"+trid.replace("row_","status_")).replaceWith("<h5 id='"+trid.replace("row_","status_")+"'><img src='/icons/unchecked2.png'/> unfinished</h5>");
        }
         console.log($("#"+trid.replace("row_","status_")).text());
        
        });
    </script>

    </body>
    
</html>
