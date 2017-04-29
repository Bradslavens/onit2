<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
function log( message ) {
  $( "<div>" ).text( message ).prependTo( "#log" );
  $( "#log" ).scrollTop( 0 );
}

$( "#birds" ).autocomplete({
  source: function( request, response ) {
    $.ajax( {
      url: "search.php",
      dataType: "jsonp",
      data: {
        term: request.term
      },
      success: function( data ) {
        response( data );
      }
    } );
  },
  minLength: 2,
  select: function( event, ui ) {
    log( "Selected: " + ui.item.value + " aka " + ui.item.id );
  }
} );
} );
</script>