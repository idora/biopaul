<?php get_header(); ?>
<div class="innerContainer">
	<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
	?>
	<div class="desc">
		<psize><?php the_content(); ?><psize>
	</div>
	<?php
			}
		}
	?>
</div>
<?php get_footer(); ?>