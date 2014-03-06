<?php get_header(); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class="">ERROR: 404</h2>
		<span class="ralign breadcrumbs">HOME > <?php the_title(); ?></span>
	</div>
	<div class="content">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail(array('class' => 'featured-img'));
		}  ?>
		<p>This page cannot be found.</p>
	</div>
	<?php include 'sidebar.php'; ?>
</div>
<?php get_footer(); ?>