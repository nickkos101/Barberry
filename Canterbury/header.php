<!doctype html>
<html>
<head>
	<title><?php wp_title(); ?></title>
	<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>
	<meta http-equiv="Content-Type" content="text/html;">
	<link href='<?php echo get_template_directory_uri(); ?>/normalize.css' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/style.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/nick.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/sara.css' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/function.js"></script>
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png"/>
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png"/>
	<?php wp_head(); ?>
	<?php 
	echo $mainoptions['ganylitics'];
	?>
	 <?php get_template_part( 'style', 'compiler' ); ?>
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="inner-wrapper">
				<p class="logo">
					<a href="<?php echo get_site_url(); ?>">
						<?php if ($mainoptions['logo'] != '') {
							echo '<img src="'.$mainoptions['logo'].'">';
						} 
						else {
							echo '<img src="'.get_template_directory_uri().'/images/logo.png">';
						}
						?>
					</a>
				</p>
				<p class="left-align">78 2ND HOUSE RD MONTAUK, NY, 11954 <br/>CONTACT@BARBERRY.COM</p>
				<p class="right-align">
					<button>My Account</button>
					<button>English</button>
				</p>
			</div>
			<div class="navigation">
				<?php wp_nav_menu(array('theme_location' => 'Header_Nav',)); ?>
			</div>
		</div>
	</div>