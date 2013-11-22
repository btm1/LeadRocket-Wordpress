<?php
/**
 * Header Template
 *
 * @package leadrocket
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php do_action( 'before' ); ?>

		<div id="wrap">
			<nav class="navbar navbar-inverse navbar-fixed-top" id="nav" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only"> <?php __('Toggle navigation', 'lr_framework') ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<?php if ( header_image() ) : ?>
							<a class="logo" href="<?php bloginfo('url'); ?>">
								<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
							</a>
						<?php else : ?>
							<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
								<?php bloginfo('name'); ?>
							</a>
						<?php endif; ?>
					</div>

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'primary',
								'depth'             => 2,
								'container'         => false,
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);
						?>

						<ul class="nav navbar-nav navbar-right">
							<li><a href="http://app.myleadrocket.com/">Log In</a></li>
						</ul>
					</div>
				</div>
			</nav>