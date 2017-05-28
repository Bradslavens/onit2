<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

var base_url = window.location.origin;

$( function() {
    function log( message ) {
      // set variable for new form field
    var field;

        field =     "<h3>Field</h3>";
        field +=    "<div class='form-group ui-widget'>";
        field +=        "<label for='field'>Field Name</label>";
        field +=        "<input id='field' class='form-control' type='text' name='field[]' placeholder='Purchase Price' value='" + message + "'>";
        field +=    "</div>";

        field +=    "<div class='form-group'>";
        field +=        "<label for='field3'>What is the Value</label>";
        field +=        "<input class='form-control' type='text' name='field[]' placeholder='$123,000'>";
        field +=    "</div>";

      $("#fieldContainer").append(field);
    }
 
    $( "#fieldSearch" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: base_url + "/fieldList",
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
        log( ui.item.value );
      }
    } );
  } );
</script>