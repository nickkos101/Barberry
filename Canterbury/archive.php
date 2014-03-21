<?php get_header(); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class=""><?php the_title(); ?> | <span><?php echo get_bloginfo('description'); ?></span></h2>
		<span class="ralign breadcrumbs">HOME > <?php the_title(); ?></span>
	</div>
	<div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="blog-post">
			<span class="date"><b><?php the_time('d'); ?></b><?php the_time('M'); ?></span>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="metadata">Posted In <?php the_category(','); ?> | Tags: <?php the_tags(); ?></p>
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail(array('class' => 'featured-img'));
			}  ?>
			<?php the_excerpt(); ?>
			<div class="bottom-metadata">
				<p class="lalign">By <?php the_author(); ?></p>
				<p class="ralign"><a href="<?php the_permalink(); ?>#commentform">Leave a Comment</a></p>
			</div>
		</div>
	<?php endwhile; else: ?>
<?php endif; ?>
</div>
<?php include 'sidebar.php'; ?>
</div>
<?php get_footer(); ?>