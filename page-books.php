<?php Themewrangler::setup_page();get_header(/***Template Name: Media Ajax */); ?>

<?php get_template_part('templates/page', 'header'); ?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">  

	<?php
    if( have_posts() ):
        while( have_posts() ): the_post();
           include locate_template('templates/archive/item.php' );
        endwhile;
    endif;
    ?>
    
    <div class="entry-content">
        <form id="genre-search">
            <input type="text" class="text-search" placeholder="Search books..." />
            <input type="submit" value="Search" id="submit-search" />
        </form>
        <div id="genre-filter">
            <?php echo get_genre_filters(); ?>
        </div>
        <div id="genre-results"></div>
    </div>
    
	</div>
</section>

<?php get_footer(); ?>