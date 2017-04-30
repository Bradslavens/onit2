<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

var base_url = window.location.origin;

$( function() {
function log( message ) {
  $( "<div>" ).text( message ).prependTo( "#log" );
  $( "#log" ).scrollTop( 0 );
}

$( "#form" ).autocomplete({
  source: function( request, response ) {
    $.ajax( {
      url: base_url + "/admin/forms",
      dataType: "json",
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