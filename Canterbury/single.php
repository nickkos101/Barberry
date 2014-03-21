<?php get_header(); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class="">Blog | <span><?php echo get_bloginfo('description'); ?></span></h2>
		<span class="ralign breadcrumbs">HOME > <?php the_title(); ?></span>
	</div>
	<div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="blog-post">
			<span class="date"><b><?php the_time('d'); ?></b><?php the_time('M'); ?></span>
			<h2><?php the_title(); ?></h2>
			<p class="metadata">Posted In <?php the_category(','); ?> | Tags: <?php the_tags(); ?></p>
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail(array('class' => 'featured-img'));
			}  ?>
			<?php the_content(); ?>
			<div class="widget sharing">
				<span>SHARE:</span>
				<ul>
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png"></a></li>
					<li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.png"></a></li>
					<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/google-icon.png"></a></li>
				</ul>
			</div>
			<div class="bottom-metadata">
				<p class="lalign">By <?php the_author(); ?></p>
				<p class="ralign"><a href="#commentform">Leave a Comment</a></p>
			</div>
		</div>
		<?php comment_form(); ?>
		<?php wp_list_comments(); ?>
	<?php endwhile; else: ?>
<?php endif; ?>
</div>
<?php include 'sidebar.php'; ?>
</div>
<?php get_footer(); ?>