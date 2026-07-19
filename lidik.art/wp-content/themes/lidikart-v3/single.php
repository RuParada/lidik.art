<?php /* Single artwork (post) */ get_header(); ?>
<div class="single-art">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1>&ldquo;<?php the_title(); ?>&rdquo;</h1>
		<p class="muted2" style="font-size:13px;margin-top:-6px"><?php echo esc_html( strip_tags( get_the_category_list( ', ' ) ) ); ?></p>
		<?php the_post_thumbnail( 'full' ); ?>
		<div class="entry-content muted" style="margin-top:24px;font-size:16.5px;line-height:1.75"><?php the_content(); ?></div>
		<p style="margin-top:30px"><a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Ask about this painting</a></p>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
