<?php 

  if ( has_post_thumbnail() ) {

    $featuredImage = get_the_post_thumbnail($page->ID,'header-bg', array('class' => 'rsImg'));

  } else {

    $featuredImage = '<img src="http://placehold.it/1200x500/C9B6F2" class="rsImg">';

  }

  if ( get_sub_field('image')) {

    $image = get_sub_field('image');

    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    $caption = $image['caption'];

    $size = 'header-bg';
    $thumb = $image['sizes'][ $size ];
    $width = $image['sizes'][ $size . '-width' ];
    $height = $image['sizes'][ $size . '-height' ];

    $mainImage = '<img src="' . $thumb . '" class="rsImg">';

  }

?>

<div class="slide">
  <div class="content">
    <div class="meta">
      <div class="row">
        <div class="desktop-10 centered">
          <?php if (!get_sub_field('custom_link')): ?>
          <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
          <a class="link right" href="<?php the_permalink();?>"><?php echo tribe_get_start_date($id, false, "l, M j, Y "); ?> | View Event</a>
          <?php else: ?>
          <h2 class="title"><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></a></h2>
          <a class="link right" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('button_text'); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="sub-meta">
      <div class="row">
        <div class="desktop-10 centered">
          <?php if (!get_sub_field('custom_link')): ?>
          <span class="sub_title_second"><?php the_field('event_title'); ?></span> | 
          <span class="sub_title_second"><?php the_field('event_subtitle'); ?></span>
          <?php else: ?>
          <span class="sub_title_second"><?php the_sub_field('subtitle'); ?></span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php if (!get_sub_field('custom_link')): ?>
  <?php echo $featuredImage; ?>
  <?php else: ?>
  <?php echo $mainImage; ?>
  <?php endif; ?>
</div>