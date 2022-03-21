<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_field('favicon', 'options'); ?>" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<?php wp_head(); ?>
	<?php if (get_field('ua_gtm', 'option')) { ?>
		<script>
			(function(w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({
					'gtm.start': new Date().getTime(),
					event: 'gtm.js'
				});
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, 'script', 'dataLayer', '<?php echo get_field('ua_gtm', 'option'); ?>');
		</script>
	<?php } ?>
	
</head>

<body <?php body_class(); ?> style="--dColor: <?php echo get_field('default_text_color', 'option'); ?>">
	<?php if (get_field('ua_gtm', 'option')) { ?>
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_field('ua_gtm', 'option'); ?>" height="0" width="0" style="display:none;visibility:hidden">
			</iframe>
		</noscript>
	<?php } ?>
	<header id="header">
		<nav class="navbar navbar-expand-lg" style="--bg-header: <?php echo get_field('bg_header', 'option'); ?>">
			<div class="container">

				<a class="navbar-brand logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<?php if (get_field('logo_header', 'option')) { ?>
						<img class="lazy-load" src="<?php echo get_field('logo_header', 'option')['url']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
					<?php } ?>
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'navbar-nav',
							'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker' => new Odin_Bootstrap_Nav_Walker()
						)
					);
					?>
				</div>
			</div>
		</nav>
	</header>