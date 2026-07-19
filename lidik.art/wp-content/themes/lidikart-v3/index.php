<?php /* Fallback template */ get_header(); ?>
<div class="section">
	<div class="art-grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<figure>
			<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?></a>
			<figcaption>&ldquo;<?php the_title(); ?>&rdquo;</figcaption>
		</figure>
	<?php endwhile; endif; ?>
	</div>
</div>
<?php get_footer(); ?>
