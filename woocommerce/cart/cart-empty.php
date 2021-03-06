<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<p class="cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop">
  <a class="button wc-backward" href="/calendar"><?php _e( 'Return to Calendar', 'woocommerce' ) ?></a>
  <a class="button wc-backward" href="/membership"><?php _e( 'Return to Membership', 'woocommerce' ) ?></a>
</p>
