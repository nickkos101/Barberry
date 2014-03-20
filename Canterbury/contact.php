<?php /* Template Name: Contact Page */ ?>
<?php get_header(); ?>
<div class="container">
	<div class="page-moniker">
		<h2 class="">Page Title</h2>
		<span class="ralign breadcrumbs">HOME > THE BLOG</span>
	</div>
	<div class="content">
		<p>Leave us a message here.</p>
		<form>
			<div class="half-column">
				<label>Name</label>
				<input type="text">
			</div>
			<div class="half-column">
				<label>Email</label>
				<input type="text">
			</div>
			<label>Message</label>
			<textarea></textarea>
			<button>Submit</button>
		</form>
	</div>
	<?php include 'sidebar.php'; ?>
</div>
<?php get_footer(); ?>