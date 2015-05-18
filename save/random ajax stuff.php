<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.8.1/mustache.min.js" type="application/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/history.js/1.8/native.history.min.js" type="application/javascript"></script>


<script>
    $('#searchform').submit(function( e ){ 

    // Stop the form from submitting
    e.preventDefault();

    // Get the search term
    var search = $('#s').val();
    var term = '/search/'+search+'?json=1';
//    var term = '/search/'+search;

    // Make sure the user searched for something
    if ( term ){

      // $.getJSON(term, function(data){
      //       var template = $('#results-list').html();
      //       var html = Mustache.to_html(template, data);
      //       $('#results').html(html);
      //       });

        // $.getJSON(term, function(data){

        //   var template = $('#posts-list').html();
        //   var html = Mustache.to_html(template, data);
        //   $('#posts').html(html);

        // });


        $.ajax({

          url: term,
          dataType : "json",
          type: 'GET',
          beforeSend: function() {
          // TODO: show your spinner
          $('#posts').html('<div class="desktop-12">loading</div>');
          },
          complete: function(data) {
          // TODO: hide your spinner
          //$('#posts').html('loaded');
          //console.log(data);
          // var template = $('#posts-list').html();
          // var html = Mustache.to_html(template, data);
          // $('#posts').html(html);
          },
          success: function(data) {
          // This only works if we're getting results from the search page... not JSON. 
          //$('#results').html( $(data).find('#results') );
          //$('#results').html(data);

            // This is it.
            var template = $('#posts-list').html();
            var html = Mustache.to_html(template, data);
            $('#posts').html(html);

            var stateObj = { foo: "bar" };
            history.pushState(stateObj, "page 2", search);

            // Need to add some animation, etc.

          }

        });

    }

});

</script>