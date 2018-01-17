<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package headstart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function headstart_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'headstart_body_classes' );


add_action( 'admin_menu', 'headstart_register_backend' );
function headstart_register_backend() {
  add_theme_page( __('About Headstart', 'headstart'), __('Headstart', 'headstart'), 'edit_theme_options', 'about-headstart.php', 'headstart_backend');
}

function headstart_backend(){ ?>
<div class="info-page-wrapper">
  <div class="info-page-top-section">
    <div class="info-page-left">
      <h2><?php echo __( 'Helpdesk & Questions', 'headstart' ); ?></h2>
      <p>
        <?php echo __( '
          If you need help with anything theme related, or have pre-sale questions please contact us  
          <a href="http://madeforwriters.com/help-support/" target="_blank">through this form</a> or email us at Help@madeforwriters.com
          we try to respond within 48 hours.
          ', 'headstart' ); ?>
        </p>
        <p>
          <?php echo __( '
            If you are having troubles with a plugin or general WordPress functionality we ask you kindly to either go to the <a href="https://wordpress.org/support/" target="_blank">WordPress support forum</a>
            or contact the author of the plugin you are having troubles with.
            ', 'headstart' ); ?>
          </p>
        </div>
        <div class="info-page-right">
          <h2><?php echo __( 'Useful Links and Resources', 'headstart' ); ?></h2>
          <ul>
            <li><?php echo __( '- <a href="http://madeforwriters.com/help-support/" target="_blank">Contact Headstart Author</a>', 'headstart' ); ?></li>
            <li><?php echo __( '- <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a>', 'headstart' ); ?></li>
            <li><?php echo __( '- <a href="http://madeforwriters.com/headstart/" target="_blank">Headstart Pro Info</a>', 'headstart' ); ?></li>
            <li><?php echo __( '- <a href="https://wordpress.org/plugins/browse/popular/" target="_blank">Popular WordPress Plugins</a>', 'headstart' ); ?></li>
          </ul>
        </div>
      </div>

      <div class="divider-border"></div>
      <h2 class="pro-vers-headline">Take Your Website To The Next Level</h2>

      <div class="text-align-center">
        <div class="version-tables">
         <a href="http://madeforwriters.com/headstart/" target="_blank" class="p-version">
          <h3>Pro Version</h3>
          <h4><strong>$39</strong> One Time Fee</h4>
          <span class="purchase-btn-wrapper">
            <span class="purchase-btn">Purchase Now</span>
          </span>
          <ul>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Text, logo & Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Height</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Only Show Header On Front Page</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Hide Top Widgets On Sub Pages</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Footer Copyright Text</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Right/Left Sidebar</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Full Width</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Navigation Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Post Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Page Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Sidebar Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Footer Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Top Widgets Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Blog Feed Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Scroll to Top Color Customisation</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Hide Navigation Logo</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">More Meta Data</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">SEO & Pagespeed Plugins</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Free Updates by Email</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Awesome Customer Support</li>
          </ul>
          <span class="purchase-button">Purchase For $39 </span>
        </a>
      </div>
    </div>

  </div>
  <?php }
