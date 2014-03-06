<?php get_header(); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class=""><?php the_title(); ?></h2>
		<span class="ralign breadcrumbs">HOME > <?php the_title(); ?></span>
	</div>
	<div class="content">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail(array('class' => 'featured-img'));
		}  ?>
		<?php the_content(); ?>
	</div>
	<?php include 'sidebar.php'; ?>
</div>
<?php get_footer(); ?>