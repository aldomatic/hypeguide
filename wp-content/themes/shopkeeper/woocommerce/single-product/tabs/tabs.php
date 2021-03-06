<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">
		
		<div class="row">
			<div class="large-12 large-centered columns">
		
				<ul class="tabs">
					
					<?php foreach ( $tabs as $key => $tab ) : ?>
		
						<li class="<?php echo $key ?>_tab">
							<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
						</li>
		
					<?php endforeach; ?>
					
				</ul>
		
			</div>
		</div>
		
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo $key ?>">
                <div class="row">
                    <div class="large-8 xlarge-6 large-centered xlarge-centered columns">
                        <?php call_user_func( $tab['callback'], $key, $tab ) ?>
                    </div>
                </div>
            </div>

		<?php endforeach; ?>
	</div>

<?php endif; ?>