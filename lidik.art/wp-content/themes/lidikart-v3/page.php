<?php /* Generic page */ get_header(); ?>
<div class="section" style="max-width:900px">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="entry-content muted" style="font-size:16.5px;line-height:1.75"><?php the_content(); ?></div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
