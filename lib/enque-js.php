<?php 

function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function my_input_enqueue() {
	if ( is_page('cart') || is_page('checkout') ){
		wp_register_script('my-script', '/assets/javascripts/jquery.inputmask.bundle.min.js', false, null);
		wp_enqueue_script('my-script');
	}
}

function myscript() {
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#billing_phone').inputmask("mask", {"mask": "999-999-9999"}); //specifying fn & options
	});
</script>
<?php
}
add_action( 'wp_footer', 'myscript' );

function myscript_jquery() {
    wp_enqueue_script( 'my_input_enqueue' );
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
if (!is_admin()) add_action("wp_enqueue_scripts", "my_input_enqueue", 11);
if (!is_admin()) add_action("wp_head", "myscript_jquery", 11);