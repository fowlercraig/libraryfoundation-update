<?php while (have_posts()) : the_post(); ?>

<div class="entry-content">
  <div class="row">

    <div class="desktop-7 blog-content tablet-4 mobile-3"><?php the_content(); ?></div>
    <?php get_sidebar(); ?>

  </div>
</div>

<?php endwhile; ?>
