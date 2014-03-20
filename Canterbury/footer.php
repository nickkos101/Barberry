	<div class="footer">
		<div class="container">
			<div class="quarter-column">
					<?php dynamic_sidebar( 'footer-col1' ); ?>
			</div>
			<div class="quarter-column">
					<?php dynamic_sidebar( 'footer-col2' ); ?>
			</div>
			<div class="quarter-column">
					<?php dynamic_sidebar( 'footer-col3' ); ?>
			</div>
			<div class="quarter-column">
					<?php dynamic_sidebar( 'footer-col4' ); ?>
			</div>

			<div class="copyright">
				<p>&copy;2014 - Theme by Business on Market St.</p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/credit_cards.png" alt="credit cards" class="right">
			</div>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>