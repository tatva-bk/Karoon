<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package karoon
 */

get_header();
?>
<main class="inner-page">
<section class="section sec__about-brief"  style="height: calc(100vh - 400px);display: flex;align-items: center;justify-content: center;">
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="contact-details" style="text-align: center;">
					<h1 style="color: #00a3e0">
						404
						<br> Page Not Found
					</h1>
					<div class="error-home-btn">
					<a href="<?php echo get_home_url();?>" style="margin-top:15px" title="Homepage" class="btn primary-btn">Go to Homepage</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	</main>

<?php
get_footer();
