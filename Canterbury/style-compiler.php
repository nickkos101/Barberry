	<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>
	<style>
	h1,h2,h3,h4,h5,h6 {
		color:<?php echo $mainoptions['headlinecolors']; ?> !important;
	}
	body {
		color:<?php echo $mainoptions['contentcolors']; ?>;
	}
	body {
		background-color: <?php echo $mainoptions['bkgcolor']; ?>;
		background-image:url(<?php echo $mainoptions['bkgimg']; ?>);
	}
	</style>