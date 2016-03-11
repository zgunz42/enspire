<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header" class="group">
		
		<div class="container group">
			<div class="group pad">
				<div class="toggle-search"><i class="fa fa-search"></i></div>
				<div class="search-expand">
					<div class="search-expand-inner">
						<?php get_search_form(); ?>
					</div>
				</div>		
			</div><!--/.pad-->
		</div><!--/.container-->
		
		<div class="container group">
			<div class="group pad">
				<?php echo alx_site_title(); ?>
				<?php if ( ot_get_option('site-description') != 'off' ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>
				
				<?php if ( has_nav_menu('topbar') ): ?>
					<nav class="nav-container group" id="nav-topbar">
						<div class="nav-toggle"><i class="fa fa-bars"></i></div>
						<div class="nav-text"><!-- put your mobile menu text here --></div>
						<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
					</nav><!--/#nav-topbar-->
				<?php endif; ?>
			
			</div><!--/.pad-->
		</div><!--/.container-->

	</header><!--/#header-->
	
	<div id="subheader">
		<?php get_template_part('inc/subheader'); ?>
	</div><!--/#subheader-->
	
	<div id="page">
		<div class="container">
			<div class="main">
				<div class="main-inner group">