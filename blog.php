<?php
	/*
		Template Name: Blog 模板
	*/
?>
<?php get_header(); ?>
<div class="innerContainer">
<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
?>
	<div class="desc hidden">
			<?php the_content(); ?>
	</div>
<?php
		}
	}
	$blog_sidebar_status = true;
	$main_classes = '';
	if (ot_get_option('blog_sidebar') == 'off') {
		$blog_sidebar_status = false;
		$main_classes = ' full-width';
	}
?>
	<div class="main<?php echo $main_classes; ?>">
<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'posts_per_page' => get_option('posts_per_page'),
		'paged' => $paged
	);
	$wp_query = new WP_Query($args);
	while($wp_query->have_posts()) {
		$wp_query->the_post();
		global $more;
		$more = 0;
?>
		<article>
			<header><h1><a href="<?php echo get_permalink(); ?>" target="_self"><?php the_title(); ?></a></h1></header>
			<section class="meta"> 时间 / <?php echo get_the_time('Y年n月j日', get_the_ID()); ?> | 评论 / <a href="#comments"><?php comments_number('暂无评论','1 条评论','% 条评论'); ?></a></section>
<?php get_post_thumbnail(); ?> 	
			<section class="entry">
				<psize><?php the_content('继续阅读'); ?><psize>
			</section>
		</article>
<?php
	}
?>
<?php bropaul_pagination(); ?>
	</div>
<?php
	if ($blog_sidebar_status) {
		get_sidebar('blog');
	}
?>
</div>
<?php get_footer(); ?>