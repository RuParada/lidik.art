<?php
/* Template Name: Gallery
 * Auto-used by a page with slug "gallery".
 * Shows every post that has a featured image (each artwork = one post). */
get_header(); ?>

<div class="section">
	<h1>Hall of Paintings</h1>
	<p class="muted" style="max-width:560px">Original paintings, graphics and collages. Every artwork exists in a single copy and ships worldwide from Germany.</p>
	<div class="filter-row" style="border-bottom:1px solid var(--line);padding-bottom:18px">
		<a class="active" href="#">All</a>
		<?php
		$cats = get_categories( array( 'hide_empty' => true ) );
		foreach ( $cats as $cat ) {
			echo '<a href="' . esc_url( get_category_link( $cat ) ) . '">' . esc_html( $cat->name ) . '</a>';
		} ?>
	</div>

	<div class="art-grid">
		<?php
		$q = new WP_Query( array( 'posts_per_page' => -1, 'meta_key' => '_thumbnail_id' ) );
		if ( $q->have_posts() ) :
			while ( $q->have_posts() ) : $q->the_post(); ?>
				<figure>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
					<figcaption>&ldquo;<?php the_title(); ?>&rdquo;<small><?php echo esc_html( strip_tags( get_the_category_list( ', ' ) ) ); ?></small></figcaption>
				</figure>
			<?php endwhile; wp_reset_postdata();
		else :
			echo '<p class="muted2">No artworks yet &mdash; add posts with featured images and they will appear here.</p>';
		endif; ?>
	</div>
	<p style="text-align:center;color:var(--mut2);font-size:13.5px">Interested in a painting? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Write to me</a> or buy directly on <a href="https://www.etsy.com/">Etsy</a> / <a href="https://www.saatchiart.com/">Saatchi Art</a>.</p>
</div>

<?php get_footer(); ?>
