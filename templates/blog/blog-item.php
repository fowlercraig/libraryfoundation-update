<article class="item blog-item hentry">
  <a href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'event-bio', array( 'class' => 'img-responsive' ) ); ?></a>
  <header>
    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="posted"><?php the_time('l, M jS, Y'); ?></p>
    <?php // echo get_the_category_list(); ?>
  </header>
  <?php the_excerpt(); ?>
  <a href="<?php the_permalink(); ?>" class="button">Read More</a>
  <a target="blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="ss-social-circle ss-icon">twitter</i></a>
  <a target="blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="ss-social-circle ss-icon">facebook</i></a>
</article>
