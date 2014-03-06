<?php get_header(); ?>
<div class="container">
	<div class="single-product">
		<div class="half-column">
			<img class="featured-img" src="images/product.jpg">
		</div>
		<div class="half-column">
			<h2><?php the_title(); ?></h2>
			<div class="review-data">
				<span class="rating">&#9733; &#9733; &#9733; &#9733; &#9734; <i>4 Reviews | Write a Review</i></span>
			</div>
			<p class="price">From: <b>$225</b></p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<ul>
				<li>Lorem Ipsum Dolor</li>
				<li>Lorem Ipsum Dolor</li>
				<li>Lorem Ipsum Dolor</li>
				<li>Lorem Ipsum Dolor</li>
			</ul>
			<label>Color</label>
			<select>
				<option>Black</option>
				<option>White</option>
				<option>Gray</option>
			</select>
			<label>Sizes</label>
			<select>
				<option>Medium</option>
				<option>Large</option>
				<option>XL</option>
			</select>
			<button>Wishlist</button>
			<div class="product-data">
				<ul>
					<li><b>SKU:</b> 635984</li>
					<li><b>Category:</b> Polo Shirts</li>
					<li><b>Brand:</b> Blurberry London</li>
					<li><b>Tags:</b> Black, Polos, Men</li>
				</ul>
			</div>
			<div class="widget sharing">
				<span>SHARE:</span>
				<ul>
					<li><img src="images/facebook-icon.png"></li>
					<li><img src="images/twitter-icon.png"></li>
					<li><img src="images/google-icon.png"></li>
				</ul>
			</div>
		</div>
		<div class="widget tabs">
			<div class="small-tab-column">
				<ul class="tab-selection">
					<li selecttab="description">Description</li>
					<li selecttab="info">Additional Info</li>
					<li selecttab="reviews">Reviews (4)</li>
					<li selecttab="about">About Burberry London</li>
				</ul>
			</div>
			<div class="tab-column">
				<div class="tab description selected">
					<h4>Product Description</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<div class="tab info">
						<h4>Additional Info</h4>
						<ul>
							<li><b>Weight:</b></li>
							<li><b>Dimensions:</b></li>
							<li><b>Colors:</b></li>
							<li><b>Sizes:</b></li>
						</ul>
					</div>
					<div class="tab reviews">
						<h4>4 Reviews for Product Title</h4>
						<div class="review">
							<img class="review-photo" src="images/product.jpg">
							<h6>Title of Reviewer - <span>Aug 16, 2013: </span> &#9733; &#9733; &#9733; &#9733; &#9734;</h6>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<button>Add Reveiw</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php get_footer(); ?>