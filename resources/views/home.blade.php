
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
                    <td><h5 id="status_{{$i}}"><img src="{{asset('icons/checked.png')}}"/> done</h5> <!-- <input type="checkbox" name="status" value="" style="font-color:red;" checked="true"> --></td>
                    <td>
                        <button id="done" class="btn btn-outline-primary" style="margin:10px;">Done</button>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
        <script>
        $("button").click( function(){
        /*
            Function change status when click on "done" button from done to undone and vice versa.
        */
            var bid = event.target.id; // button ID 
            var trid = $(event.target).closest('tr').attr('id'); // table row ID 
            console.log(bid,trid);
            if($("#"+trid.replace("row_","status_")).text().includes("done"))
            {
                $("#"+trid.replace("row_","status_")).replaceWith("<h5 id='"+trid.replace("row_","status_")+"'><img src='/icons/unchecked2.png'/> unfinished</h5>");
            }
            else{
                $("#"+trid.replace("row_","status_")).replaceWith("<h5 id='"+trid.replace("row_","status_")+"'><img src='/icons/checked.png'/> done</h5>");
            }
            console.log($("#"+trid.replace("row_","status_")).text());
        
        });

    </script>

    </body>
    
</html>
