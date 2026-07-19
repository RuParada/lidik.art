<?php
/* Template Name: Exhibitions — page slug "exhibitions" */
get_header(); ?>

<div class="section" style="max-width:900px">
	<h1>Exhibitions</h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry-content muted" style="font-size:16.5px;line-height:1.75"><?php the_content(); ?></div>
	<?php endwhile; endif; ?>
	<div class="timeline" style="margin-top:20px">
		<div class="row"><span class="year">20__</span><div><b>Exhibition name</b><div class="muted2" style="font-size:13px">City, gallery &mdash; fill in via the page editor</div></div></div>
		<div class="row"><span class="year">20__</span><div><b>Exhibition name</b><div class="muted2" style="font-size:13px">City, gallery</div></div></div>
	</div>
</div>

<?php get_footer(); ?>
