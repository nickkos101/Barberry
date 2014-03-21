<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>
	<style>
		<?php if (isset($mainoptions['bordercolors'])) { ?>
			* {
				border-color:<?php echo $mainoptions['bordercolors']; ?> !important;
			}
		<?php } ?>
		<?php if (isset($mainoptions['headlinecolors'])) { ?>
			h1,h2,h3,h4,h5,h6 {
			color:<?php echo $mainoptions['headlinecolors']; ?> !important;
			}
			a {
			color:<?php echo $mainoptions['headlinecolors']; ?>;
			}
		<?php } ?>
		<?php if (isset($mainoptions['contentcolors'])) { ?>
			body {
			color:<?php echo $mainoptions['contentcolors']; ?>;
			}
		<?php } ?>
		<?php if (isset($mainoptions['bkgcolor']) || isset($mainoptions['bkgimg'])) { ?>
			body {
			background-color: <?php echo $mainoptions['bkgcolor']; ?>;
			background-image:url(<?php echo $mainoptions['bkgimg']; ?>);
			}
		<?php } ?>
		<?php if (isset($mainoptions['bkgcolor'])) { ?>
			.product-content span {
			background-color: <?php echo $mainoptions['bkgcolor']; ?>;
			}
		<?php } ?>
		<?php if (isset($mainoptions['headlinecolors'])) { ?>
			.slider-stripe {
			background-color: <?php echo $mainoptions['headlinecolors']; ?>;
			}
		<?php } ?>
	</style>