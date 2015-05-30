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