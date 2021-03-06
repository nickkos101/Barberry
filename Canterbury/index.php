<?php get_header(); ?>
<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>
<div class="slider">
	<div class="slider-stripe"></div>
	<div class="container">
		<?php query_posts(array('post_type' => 'products', 'posts_per_page' => 4)); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="slide">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}  
			?>
			<div class="overlay">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
</div>
<div class="container">
	<div class="hp-content">
		<div class="half-column">
			<div class="box ctext">
				<div class="inner-wrapper">
					<h2><?php echo $mainoptions['leftblocktitle']; ?></h2>
				</div>
			</div>
		</div><div class="half-column">
		<div class="box ctext">
			<div class="inner-wrapper">
				<h2><?php echo $mainoptions['rightblocktitle']; ?></h2>
			</div>
		</div>
	</div>
	<?php if ($mainoptions['showproducts'] == 1) { ?>
	<div class="widget">
		<h3>Products</h3>
		<?php query_posts(array('post_type' => 'products', 'posts_per_page' => 4)); ?>
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
				<h4><?php the_title(); ?></h4>
				<p>$<?php echo autoc_get_postdata('price'); ?></p>
				<div class="product-metadata">
					<p><a href="<?php the_permalink(); ?>">Learn more</a></p>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php } ?>
<?php if ($mainoptions['showbrands'] == 1) { ?>
<div class="widget">
	<h3>Brands</h3>
	<div class="brands">
		<?php
		$brandlist =  get_terms('brands');
		print_r($brandlist);
		foreach ($brandlist as $brand) {

			$t_ID = $brand->term_id;
			$term_data = get_option("taxonomy_$t_ID");
			$imageURL = $term_data['taxonomy_image_url'];

			if(!isset($imageURL)) {
				echo '<p>';
				echo 'Missing image for brand '.$brand->name;
				echo '</p>';
			}
			else {
				echo '<img src="'.$imageURL.'">';
			}
		}
		?>
	</div>
</div>
<?php } ?>
<?php if ($mainoptions['flexgrid'] == 1) { ?>
<div class="widget">
	<div class="third-column">
		<h4><?php echo $mainoptions['content1blocktitle']; ?></h4>
		<p><?php echo $mainoptions['content1blocktext']; ?></p>
	</div>

	<div class="third-column">
		<h4><?php echo $mainoptions['content2blocktitle']; ?></h4>
		<p><?php echo $mainoptions['content2blocktext']; ?></p>
	</div>
	<div class="third-column">
		<h4><?php echo $mainoptions['content3blocktitle']; ?></h4>
		<p><?php echo $mainoptions['content3blocktext']; ?></p>
	</div>
</div>
<?php } ?>
</div>
</div>
<?php get_footer(); ?>