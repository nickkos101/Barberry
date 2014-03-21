<?php /* Template Name: Contact Page */ ?>
<?php get_header(); ?>
<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class=""><?php the_title(); ?></h2>
		<span class="ralign breadcrumbs">HOME > <?php the_title(); ?></span>
	</div>
	<div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	</iframe>
	<?php the_content(); ?>
	<?php if(isset($mainoptions['physicaladdress'])) { ?>
	<iframe style="margin-top:10px; margin-bottom:10px;" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $mainoptions['physicaladdress']; ?>&output=embed"></iframe>
	<?php } ?>
	<form method="get" action="<?php echo get_template_directory_uri().'/form-process.php'; ?>">
		<div class="half-column">
			<label>Name</label>
			<input name="fromName" type="text">
		</div>
		<div class="half-column">
			<label>Email</label>
			<input name="fromEmail" type="text">
		</div>
		<label>Message</label>
		<textarea name="message"></textarea>
		<input name="returnURL" type="hidden" value="<?php the_permalink(); ?>">
		.<input name="toEmail" type="hidden" value="<?php echo $mainoptions['contactemail']; ?>">
		<input type="submit">
	</form>
<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>