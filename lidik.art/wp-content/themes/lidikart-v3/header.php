<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>(function(){try{var t=localStorage.getItem('lidikart-theme');document.documentElement.setAttribute('data-theme', t==='light' ? 'light' : 'dark');}catch(e){}})();</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="LidikART home">
		<span class="logo-text">
			<span class="logo-name">LidikART</span>
			<span class="logo-sub">ANOTHER WORLD</span>
		</span>
		<img class="logo-face" src="<?php echo lidikart_asset( 'img/face.png' ); ?>" alt="">
	</a>
	<nav class="site-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'lidikart_default_menu' ) ); ?>
	</nav>
	<button class="theme-toggle" aria-label="Switch light/dark theme">&#9728;</button>
</header>
