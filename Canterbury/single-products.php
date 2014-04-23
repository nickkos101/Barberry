<?php get_header(); ?>
<div class="container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="single-product">
		<div class="half-column">
		<div class="product-img">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}  ?>
		</div>
		</div>
		<div class="half-column">
			<h2><?php the_title(); ?></h2>
			<div class="review-data">
				<span class="rating"><?php the_rating(); ?><i><?php comments_number( '0', '1', '%' ); ?> Reviews | <a class="r-form" selecttab="comments" href="#commentform">Write a Review</a></i></span>
			</div>
			<p class="price">From: <b>$<?php echo autoc_get_postdata('price'); ?></b></p>
			<?php the_excerpt(); ?>
			<div class="product-data">
				<ul>
					<li><b>SKU:</b> <?php echo autoc_get_postdata('SKU') ?></li>
					<li><b>Category:</b> <?php the_category(','); ?></li>
					<li>
						<b>Brand:</b> <?php get_brands($post->ID); ?>
					</li>
					<li><b>Tags:</b> <?php the_tags(); ?></li>
				</ul>
			</div>
			<div class="widget sharing">
				<span>SHARE:</span>
				<ul>
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.png"></a></li>
					<li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-icon.png"></a></li>
					<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/google-icon.png"></a></li>
				</ul>
			</div>
		</div>
		<div class="widget tabs">
			<div class="small-tab-column">
				<ul class="tab-selection">
					<li selecttab="description">Description</li>
					<li selecttab="info">Additional Info</li>
					<li selecttab="reviews">Reviews (<?php comments_number( '0', '1', '%' ); ?>)</li>
					<li selecttab="about"><?php the_title(); ?> Brands</li>
				</ul>
			</div>
			<div class="tab-column">
				<div class="tab description selected">
					<h4><?php the_title(); ?> Description</h4>
					<?php the_content(); ?>
				</div>
				<div class="tab info">
					<h4>Additional Info</h4>
					<ul>
						<li><b>Weight:</b> <?php echo autoc_get_postdata('weight'); ?></li>
						<li><b>Dimensions:</b> <?php echo autoc_get_postdata('dimensions'); ?></li>
						<li><b>Colors:</b> <?php get_colors($post->ID); ?></li>
						<li><b>Sizes:</b> <?php get_sizes($post->ID); ?></li>
					</ul>
				</div>
				<div class="tab reviews">
					<h4><?php comments_number( '0', '1', '%' ); ?> Reviews for <?php the_title(); ?></h4>
					<ol>
						<?php comments_template(); ?>
					</ol>
					<button>Add Reveiw</button>
				</div>
				<div class="tab comments">
					<?php comment_form(array( 'title_reply' => 'Post a Review' )); ?>
				</div>
				<div class="tab about">
					<h4><?php the_title(); ?> Brands</h4>
					<?php list_info($post->ID); ?>
				</div>
			</div>
		</div>
	</div>	
<?php endwhile; else: ?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>