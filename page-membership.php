<?php Themewrangler::setup_page();get_header(); ?>

<?php

  get_template_part('templates/page', 'header');
  get_template_part('templates/page', 'content');
  get_template_part('templates/member', 'content');

?>

<?php if (isset($_GET['calendar'])): ?>
  <script>
    $(function(){
      $('html, body').animate({
        scrollTop: $("#tab-1").offset().top - 180
      }, 400);
    });
  </script>
<?php endif; ?>

<?php get_footer(); ?>