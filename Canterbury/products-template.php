<?php /* Template Name: Products Page */ ?>
<?php get_header(); ?>
<div class="container">
<div class="left-sb">
	<?php get_sidebar(); ?>
</div>
	<div class="products">
		<?php the_content(); ?>
		<h2>Products</h2>
		<?php query_posts(array('posts_per_page' => 4, 'post_type' => 'products')); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="product">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}  
			else {
				echo '<img alt="missing" src="http://placehold.it/250">';
			}
			?>
			<div class="product-content">
				<span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<p>$<?php echo autoc_get_postdata('price'); ?></p>
				<div class="product-metadata">
					<p><a href="<?php the_permalink(); ?>">Learn more</a></p>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>