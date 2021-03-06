<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	$classes = array();
	$classes[] = 'ui-row';
	$classes[] = cloudfw('row_class');

	$gallery_style = cloudfw_get_option( 'woocommerce', 'gallery_style' );
	if ( $gallery_style == 'vertical' ) {
		$classes[] = 'ui--wc-vertical-gallery';
		$gallery_column_width = apply_filters( 'cloudfw_wc_gallery_column_width', 'span8' );
		$content_column_width = apply_filters( 'cloudfw_wc_content_column_width', 'span4' );
	} else {
		$classes[] = 'ui--wc-horizontal-gallery';
		$content_column_width = apply_filters( 'cloudfw_wc_content_column_width', 'span6' );
		$gallery_column_width = apply_filters( 'cloudfw_wc_gallery_column_width', 'span6' );
	}

?>


<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div <?php echo cloudfw_make_class( $classes, true ); ?>>

			<div class="<?php echo $content_column_width; ?> summary entry-summary">

				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );

				?>

			</div><!-- .summary -->

			<div class="<?php echo $gallery_column_width; ?> single-product-image">
				<?php
					/**
					 * woocommerce_show_product_images hook
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );

					if ( ! is_page() ) {
						do_action( 'woocommerce_after_single_product_summary' );
					}
				?>
			</div>

		</div>


</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
