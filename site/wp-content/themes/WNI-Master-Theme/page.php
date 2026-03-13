<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/

get_header();
?>
	<main id="content" class="pagefadein">
			<?php get_template_part('partials/page-banner'); ?>
			<?php get_template_part('partials/flexible-sections'); ?>

	</main>
<?php get_footer(); ?>

<?php /*
	// page.php frequently used methods

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php endif; wp_reset_postdata(); ?> // immediately after every custom WP_Query()

	<?php endif; wp_reset_query(); ?> // immediately after every loop using query_posts()
*/ ?>
