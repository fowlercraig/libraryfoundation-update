<?php if( have_rows('password_protected_2', 'options') ): ?>
<script>
<?php 
  while ( have_rows('password_protected_2', 'options') ) : the_row(); 

  $ticket_name = get_sub_field('event_name');
  $ticket_name = preg_replace('/[^A-Za-z0-9]/', '', $ticket_name);
  // convert the string to all lowercase
  $ticket_name = strtolower($ticket_name);

?>

$(document).ready(function(){

<?php if( have_rows('related_ticket_groups') ):?>
$(".ticket_<?php echo $ticket_name; ?> .tickets_name").append('<a href="#<?php echo $ticket_name; ?>_box" class="alert">Members Only: Click to unlock</a>');
<?php else: ?>
$(".ticket_<?php echo $ticket_name; ?> .tickets_name").append('<a href="#" class="noted">Members Only: Click to unlock</a>');
<?php endif; ?>  
$(".ticket_<?php echo $ticket_name; ?> .quantity input").prop('disabled', true);

$("#login_<?php echo $ticket_name; ?>").click(function(){
  if( $("#loginpassword_<?php echo $ticket_name; ?>").val()=="<?php the_sub_field('password'); ?>") {
    $(".ticket_<?php echo $ticket_name; ?> .quantity input").prop('disabled', false);
    $.magnificPopup.close();
  }
  else {

    alert("Please try again");
  }
});

$("#alt_login_<?php echo $ticket_name; ?>").click(function(){
  if( $("#alt_loginpassword_<?php echo $ticket_name; ?>").val()=="<?php the_sub_field('password'); ?>") {
    //$(".ticket_<?php echo $ticket_name; ?> .quantity input").prop('disabled', false);
    //$.magnificPopup.close();
    $(".quantity input").stepper("enable");
    $(".noted").addClass('active').text("Awesome, you're in.");
    setTimeout(function(){
      $("#password-entry").animate({
      height: 0,
      paddingTop: 0,
      paddingBottom: 0
    },300);
    },300);
  }
  else {
    
    alert("Please try again");
  }
});

$(window).keydown(function(event){
  if(event.keyCode == 13) {
    event.preventDefault();
  if( $("#loginpassword_<?php echo $ticket_name; ?>").val()=="<?php the_sub_field('password'); ?>") {
    $(".ticket_<?php echo $ticket_name; ?> .quantity input").prop('disabled', false);
    $.magnificPopup.close();
  }
  else {
    alert("Please try again");
  }
    return false;
  }
});

<?php if( !have_rows('related_ticket_groups') ):?>

  $(".ticket .noted").click(function(){

    $('#password-entry').addClass('active').animate({
      height: '78px',
      paddingTop: 20,
      paddingBottom: 20
    },300);

    $("#<?php echo $ticket_name; ?>_box").show();

    // var ticketid = $(this).parent().parent().attr('id').replace('ticket_','');
    // var ticketbox = '#' + ticketid + '_box form';
    // console.log(ticketbox);

    // $(ticketbox).clone().prependTo("#password-entry").removeClass(); 

  });

  

  $('#password-entry .cancel').click(function(){
    $("#password-entry").animate({
      height: 0,
      paddingTop: 0,
      paddingBottom: 0
    },300);
  });

  $('#password-entry .activate').click(function(){
    //$(".ticket_<?php echo $ticket_name; ?> .quantity input").prop('disabled', false);
    $(".quantity input").stepper("enable");
    $(".noted").addClass('active').text("Awesome, you're in.");
    setTimeout(function(){
      $("#password-entry").animate({
      height: 0,
      paddingTop: 0,
      paddingBottom: 0
    },300);
    },300);
    
  });

<?php endif; ?>  

<?php endwhile; ?>

});

  $(document).ready(function(){
    $('.alert').magnificPopup({
      type: 'inline',
      preloader: false,
      //closeBtnInside: false,
      mainClass: 'mfp-fade',
      callbacks: {
        open: function() {
          $('body').addClass('.members-only-ignited');
        },
        close: function() {
          $('body').removeClass('.members-only-ignited');
        },
      }
    });
  });
});

</script>
<?php endif; ?>

<?php if( have_rows('password_protected_2', 'options') ): ?>
<?php while ( have_rows('password_protected_2', 'options') ) : the_row(); ?>

<div id="<?php echo $ticket_name; ?>_box" class="mfp-hide white-popup-block modal-window">
  <h2>Unlock <?php the_sub_field('event_name'); ?></h2>
  <p><a href="/membership">Click here if you're not already a member.</a></p>
  <form action="" method="post" class="row">
    <input type="password" id="loginpassword_<?php echo $ticket_name; ?>" placeholder="Password" class="desktop-9 tablet-5 mobile-3" />
    <input type="button" id="login_<?php echo $ticket_name; ?>" value="Unlock" class="desktop-3 tablet-1 mobile-3" />
  </form>
</div>

<?php endwhile; ?>
<?php endif; ?>