$('a[data-toggle="pill"]').on( 'shown.bs.tab', function (e) {
    $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
} );

$(document).ready(function() {
    $('#myTable').DataTable();
} );
$(document).ready(function() {
      $('#myTable2').DataTable();
} );