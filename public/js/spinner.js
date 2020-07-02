$.ajax({
    statusCode: {
        200: function() {
            $( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                var client = new XMLHttpRequest();
                client.open("GET", "/home/data");
                client.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");
                client.send();
            });
        }
    }
  });