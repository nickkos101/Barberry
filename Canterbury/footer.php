<?php $optionname= 'main_theme_options'; $mainoptions = get_option($optionname); ?>	
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
			<p>&copy;2014 - Theme by Business on Market St. <?php echo $mainoptions['footertext']; ?></p>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>