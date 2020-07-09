
<html>
<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script type="text/javascript" charset="utf8" src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>

		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<script type="text/javascript" charset="utf8" src="{{asset('js/popper.min.js')}}" ></script>
		<script type="text/javascript" charset="utf8" src="{{asset('js/bootstrap.min.js')}}" ></script>
        
        <!-- Tabulator sources below: -->
        <link href="{{asset('tabulator-master/dist/css/semantic-ui/tabulator_semantic-ui.min.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('tabulator-master/dist/js/tabulator.min.js')}}"></script>

        <!-- Semantic UI sources below -->
        <link href="{{asset('Semantic-UI-CSS-master/semantic.min.css')}}" rel="stylesheet">
        <!-- <script type="text/javascript" src="{{asset('Semantic-UI-CSS-master/semantic.min.js')}}"></script>-->

	</head>
    <body>
    <div class="main ui container">
        <div id="myTable"> </div>
        <input class="ui button" type="submit" value="Send data to DB" name="sendToDB" id = "sendToDB" style="margin-left: 25px;"/>
        <button class="ui button" type="button" name="addRow" id="addRow">add Data to Row</button>

        <div class="main ui container" >
            <div class="ui form" style="display: none;" id="myForm">
                <div class="field">
                    <label>Id</label>
                    <span id="id" class="hidden"></span>
                </div>
                <div class="field">
                    <label>Content</label>
                    <input type="text" id="contentText" placeholder="Content Task...">
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" tabindex="0" id="statusTask" />
                        <label>Task status</label>
                    </div>
                </div>
                <button class="ui button" id="addDataToRow">add Data to Row</button>
            </div>
        </div>
        </div>
        <script>
            var table = new Tabulator("#myTable", {
                layout:"fitColumns",      //fit columns to width of table
                responsiveLayout:"hide",  //hide columns that dont fit on the table
                tooltips:true,            //show tool tips on cells
                addRowPos:"top",          //when adding a new row, add it to the top of the table
                history:true,             //allow undo and redo actions on the table
                pagination:"local",       //paginate the data
                paginationSize:7,         //allow 7 rows per page of data
                movableColumns:true,      //allow column order to be changed
                resizableRows:true,       //allow row order to be changed
                ajaxURL:"{{ url('index')}}", //ajax URL
                ajaxConfig:"get", //ajax HTTP request type
                ajaxResponse:function(url, params, response){
                    //url - the URL of the request
                    //params - the parameters passed with the request
                    //response - the JSON object returned in the body of the response.

                    return response.data; //return the data property of a response json object
                },
                columns: [
                            { title: 'Id',      field: 'id',      width: "10%" },
                            { title: 'Content', field: 'content', width: "80%" },
                            { title: 'Status',  field: 'status',  width: "10%",formatter:"tickCross", sorter:"boolean",editor:true }
                        ]
                });
                $("#addDataToRow").click(function(e){
                    var myId=Number($("#id").text());
                    var myContent=$("#contentText").val();
                    var myStatus=$("#statusTask").is(":checked")?1:0;
                    table.addRow({id:myId, content:myContent, status:myStatus, height:1}, false);
                });

                $("#addRow").click(function(e){
                    if($("#myForm").is( ":hidden" ))
                    {
                        $( "#myForm" ).show();
                        $( "#addRow" ).text( "Hide Form" );
                        $( "#addRow" ).removeClass( "ui button" ).addClass( "ui active button" );
                      
                        var columnId = table.getColumn("id")._column;
                        var max = columnId.cells[0].value;
                        for(var i = 0; i < columnId.cells.length; i++)
                        {
                            if(columnId.cells[i].value > max)
                                {
                                    max = columnId.cells[i].value;
                                }
                        }
                        $( "#id" ).text(Number(max)+1);                             
                    }
                    else{
                        $( "#myForm" ).hide();
                        $( "#addRow" ).text( "add Data to Row" );
                        $( "#addRow" ).removeClass( "ui active button" ).addClass( "ui button" );
                    }

                });
                $("#sendToDB").click(function(e){

                    e.preventDefault();

                    $( "p" ).empty();
                    $( "p" ).append('<div class="progress"> <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div><h2 style="font-family:arial;position:60%;"> Trwa ładowanie wyników z bazy</h2>');
                    $( "p" ).show();
                    var t = table.getData();
                    $.ajax({

                        type:'GET',
                        url:'/data/',
                        data:{table:t},

                        complete: function(data){
                            $("p").hide();

                            if( !data.responseText.includes('HTTP'))
                            {
                                $( "p" ).empty();
                                $( "p" ).append(data.responseText);
                                $( "p" ).show();
                            }
                            else{
                                window.location.replace('/');
                            }
                        }

                    });


                });
        </script>

    </body>
    
</html>
