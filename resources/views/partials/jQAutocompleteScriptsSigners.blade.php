<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

var base_url = window.location.origin;

$( function() {
    function log( message ) {
      // set variable for new form field
    var signer;

        signer =     "<h3>Signer</h3>";
        signer +=    "<div class='form-group ui-widget'>";
        signer +=        "<label for='signer'>Signer Name</label>";
        signer +=        "<input id='signer' class='form-control' type='text' name='signer[]' placeholder='Add Signer\'s name' value='" + message + "'>";
        signer +=    "</div>";

        signer +=    "<div class='form-group'>";
        signer +=        "<label for='signer3'>What is there role?</label>";
        signer +=        "<input class='form-control' type='text' name='signer[]' placeholder='Buyer'>";
        signer +=    "</div>";

        signer +=    "<div class='checkbox'>";
          signer +=      "<label>";
            signer +=      "<input type='checkbox' name='signer[]' value='yes'>"; 
              signer +=     "signed";
          signer +=      "</label>";
        signer +=      "</div>";

        signer +=      "<div class='checkbox'>";
          signer +=      "<label>";
            signer +=      "<input type='checkbox' name='signer[]' value='no'>"; 
            signer +=      "not signed";
          signer +=      "</label>";
        signer +=      "</div>";           

      $("#signerContainer2").append(signer);
    }
 
    $( "#signers" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: base_url + "/currentContacts",
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