<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package karoon
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php 
			$member_qualification = get_field('member_qualification');
			$member_designation = get_field('member_designation');
			$committees_title = get_field('committees_title');
			$committees_name = get_field('committees_name');
			$team_name_heading = get_field('team_name_heading');
		?>
		<section class="banner inner-banner karoon-inner-banner karoon-director-detail-banner">
			<div class="banner-img">
				<img src="<?php echo get_template_directory_uri(); ?>/public/images/director-detail-banner.jpg" class="mobile-hide" alt="Banner image">
				<img src="<?php echo get_template_directory_uri(); ?>/public/images/director-detail-mobile-banner.jpg" class="mobile-show" alt="Banner image">
			</div>
			<div class="karoon-container sm">
				<?php if ($member_designation != '' || $member_designation != '') { ?>
					<div class="banner-content">
						<h1> <?php 
								if ($team_name_heading != '') {
									echo $team_name_heading;
								} else {
									the_title();
								} ?>
						</h1>
						<span><?php echo $member_qualification; ?></span>
						<p><?php echo $member_designation; ?></p>
					</div>
				<?php } ?>
			</div>
		</section>
		<section class="karoon-cms-content-wrapper director-detail-wrapper">
				<div class="karoon-container sm">
					<?php the_content(); ?>
					<?php if ($committees_title != '' || $committees_name != '') { ?>
						<div class="detail-block">
							<h2><?php echo $committees_title; ?></h2>
							<?php echo $committees_name; ?>
						</div>
					<?php } ?>
				</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
