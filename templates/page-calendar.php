<?php

$eventCat = get_sub_field('event_category_slug');

$args = array(
  'post_type' => 'tribe_events',
  'posts_per_page'=> -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'tribe_events_cat',
      'field'    => 'slug',
      'terms'    => $eventCat,
      ),
    array(
      'taxonomy' => 'tribe_events_cat',
      'field'    => 'slug',
      'terms'    => array('hidden'),
      'operator' => 'NOT IN'
      ),
    ),

  'eventDisplay' => 'upcoming',
  );

$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query($args);

$old_args = array(
  'post_type' => 'tribe_events',
  'posts_per_page'=> -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'tribe_events_cat',
      'field'    => 'slug',
      'terms'    => $eventCat,
      ),
    ),
  'eventDisplay' => 'past',
  );

$old_temp = $old_wp_query;
$old_wp_query = null;
$old_wp_query = new WP_Query();
$old_wp_query->query($old_args);

$ul_args = array(
  'post_type' => 'tribe_events',
  'posts_per_page'=> -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'tribe_events_cat',
      'field'    => 'slug',
      'terms'    => $eventCat,
      ),
    array(
      'taxonomy' => 'tribe_events_cat',
      'field'    => 'slug',
      'terms'    => array('hidden'),
//'operator' => 'NOT IN'
      ),
    ),
  );

$ul_temp = $ul_wp_query;
$ul_wp_query = null;
$ul_wp_query = new WP_Query();
$ul_wp_query->query($ul_args);

?>

<div id="calendar-module">
  <div class="tabbed">
    <menu class="tabber-menu">
      <div class="row">
        <div class="desktop-12">
          <a href="#tab-1" class="button tabber-handle">Current Calendar</a>
          <a href="#tab-2" class="button tabber-handle">Past Events</a>
          <!--<a href="#tab-3" class="button tabber-handle">Member Events</a>-->
          <a href="/calendar" class="button ext">View Full Event Calendar</a>
        </div>
      </div>
    </menu>
    <div class="tabber-tab tribe-events-list" id="tab-1">

      <?php  ?>
      <?php $counter = 1; if ( have_posts() ) :while ($wp_query->have_posts()) : $wp_query->the_post();?>

      <?php
      $thumb_id = get_post_thumbnail_id();
      $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-bg', true);
      $thumb_url = $thumb_url_array[0];
      $event_bg  = $thumb_url;
      if ( has_post_thumbnail() ) {
        $bg = 'bg';
      } else {
        $bg = 'bg noimage';
      }
      ?>



      <div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
        <div class="row">
          <?php tribe_get_template_part( 'list/single', 'event' ) ?>
        </div>
        <div class="<?php echo $bg; ?>" style="background-image:url(<?php echo $event_bg; ?>);"></div>
      </div>



      <?php $counter++; endwhile; ?>
      <?php $wp_query = null; $wp_query = $temp;  ?>
    <?php else: ?>
    <div class="row">
      <div class="desktop-12">
        <h2 class="no-events">Sorry, no upcoming events.</h2>
      </div>
    </div>
  <?php endif; wp_reset_query(); ?>

</div>
<div class="tabber-tab tribe-events-list" id="tab-2">
  <?php $counter = 1; if ( have_posts() ) : while ($old_wp_query->have_posts()) : $old_wp_query->the_post();?>
  <?php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-bg', true);
  $thumb_url = $thumb_url_array[0];
  $event_bg  = $thumb_url;
  ?>
  <div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
    <div class="row">
      <?php tribe_get_template_part( 'list/single', 'event' ) ?>
    </div>
    <div class="bg" style="background-image:url(<?php echo $event_bg; ?>);"></div>
  </div>
  <?php $counter++; endwhile; ?>
  <?php $old_wp_query = null; $old_wp_query = $old_temp;  ?>
<?php else:?>
  <h2 class="no-events">Sorry, no past events.</h2>
  <a class="button past-events-btn" href="#tab-2">View current events</a>
<?php endif;  wp_reset_query(); ?>
</div>

<div class="tabber-tab tribe-events-list" id="tab-6">


  <div id="first" class="password-protected">
    <div class="row">
      <div class="desktop-4 tablet-4 mobile-3 centered">
        <form action="" method="post" class="row">
          <input type="password" id="loginpassword" placeholder="Password" class="desktop-9 tablet-5 mobile-3" />
          <input type="submit" id="login" value="Unlock" class="desktop-3 tablet-1 mobile-3" />
        </form>
      </div>
    </div>
  </div>

  <div id="second" style="display:none">
    <?php if ( have_posts() ) : ?>
    <?php $counter = 1; while ($ul_wp_query->have_posts()) : $ul_wp_query->the_post();?>

    <?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-bg', true);
    $thumb_url = $thumb_url_array[0];
    $event_bg  = $thumb_url;
    if ( has_post_thumbnail() ) {
      $bg = 'bg';
    } else {
      $bg = 'bg noimage';
    }
    ?>

    <div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>">
      <div class="row">
        <?php tribe_get_template_part( 'list/single', 'event' ) ?>
      </div>
      <div class="<?php echo $bg; ?>" style="background-image:url(<?php echo $event_bg; ?>);"></div>
    </div>
    <?php $counter++; endwhile; ?>
    <?php $ul_wp_query = null; $ul_wp_query = $ul_temp; wp_reset_postdata(); ?>
  <?php else: ?>
  <h2 class="no-events">Sorry, no member events.</h2>
<?php endif; ?>
</div>


</div>

</div>
</div>


<script>
$(document).ready(function(){

  if( $('#tab-2').html().match(/^\s*$/)) {
    if ( $('body').hasClass('page-the-council')) {
      $('#tab-2').prepend('<div class="row"><div class="desktop-12 tablet-6 mobile-3"><h2 class="no-events">Visit our <a target="blank" href="https://www.flickr.com/photos/89625359@N08/sets/">photo gallery</a> to view past events.</h2></div></div>');
    } else {
      $('#tab-2').prepend('<div class="row"><div class="desktop-12 tablet-6 mobile-3"><h2 class="no-events">Sorry, there are no past events.</h2></div></div>');
    }
  }

// on click Sign In Button checks that username =='admin' and password == 'password'
$("#login").click(function(){
  if( $("#loginpassword").val()=='password') {
    $("#first").hide();
    $("#second").show();
  }
  else {
    alert("Please try again");
  }



// $("#logout").click(function() {
// $("form")[0].reset();
// $("#first").show();
// $("#second").hide();
});

});
</script>