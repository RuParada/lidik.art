<?php get_header(); ?>

<section class="hero">
	<div class="hero-grid">
		<div>
			<h1>Welcome to another world</h1>
			<p>Dreams, myths and fairy tales for grown-ups in the paintings of Ukrainian artist Lidiia Ma. Original artworks and hand-painted walls &mdash; from the studio near T&uuml;bingen to your home.</p>
			<p style="display:flex;gap:18px;align-items:center;margin:0">
				<a class="btn" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Enter the gallery</a>
				<a class="link-underline" href="<?php echo esc_url( home_url( '/murals/' ) ); ?>">Order a wall mural</a>
			</p>
		</div>
		<figure class="hero-art">
			<img src="<?php echo lidikart_asset( 'img/art/heart.jpg' ); ?>" alt="Universal Heart">
			<figcaption><b>&ldquo;Universal Heart&rdquo;</b> &middot; acrylic on canvas</figcaption>
		</figure>
	</div>
</section>

<section class="section">
	<div class="section-head">
		<h2>Hall of Paintings</h2>
		<a class="link-underline" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">View all paintings &rarr;</a>
	</div>
	<div class="art-grid">
		<?php
		/* Latest 4 posts with featured images; falls back to bundled samples. */
		$q = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => '_thumbnail_id' ) );
		if ( $q->have_posts() ) :
			while ( $q->have_posts() ) : $q->the_post(); ?>
				<figure>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
					<figcaption>&ldquo;<?php the_title(); ?>&rdquo;</figcaption>
				</figure>
			<?php endwhile; wp_reset_postdata();
		else :
			$samples = array(
				array( 'melusinka.jpg', 'Melusine Is Born' ),
				array( 'fear.jpg', 'Let Me Go, Fear' ),
				array( 'beauty-in-pain.jpg', 'Beauty in Pain' ),
				array( 'full-moon.jpg', 'Full Moon' ),
			);
			foreach ( $samples as $s ) {
				echo '<figure><img src="' . lidikart_asset( 'img/art/' . $s[0] ) . '" alt="' . esc_attr( $s[1] ) . '" loading="lazy"><figcaption>&ldquo;' . esc_html( $s[1] ) . '&rdquo;</figcaption></figure>';
			}
		endif; ?>
	</div>
</section>

<section class="section" id="murals" style="border-top:1px solid var(--line)">
	<h2>Wall Murals &mdash; Wandmalerei</h2>
	<p class="muted" style="max-width:560px;font-size:16.5px">Hand-painted murals for your living room, caf&eacute;, office or children's room. I come to you, discuss the idea, prepare a sketch and paint directly on your wall.</p>
	<div class="stat-cards">
		<div class="stat-card"><div class="big">&euro;18<span> / hour</span></div><p>Transparent hourly rate (Stundensatz) &mdash; you only pay for painting time. Paint and materials by agreement.</p></div>
		<div class="stat-card"><div class="big">50 km</div><p>Service area: Landkreis T&uuml;bingen and up to 50 km around &mdash; Reutlingen, Rottenburg, Herrenberg, Stuttgart.</p></div>
		<div class="stat-card"><div class="big">Free</div><p>Estimate &amp; sketch consultation (Kostenvoranschlag) &mdash; send a photo of your wall and your idea.</p></div>
	</div>
	<a class="btn" href="<?php echo esc_url( home_url( '/murals/' ) ); ?>">Murals: portfolio &amp; details</a>
</section>

<section class="buy-strip">
	<div class="label">Originals &amp; prints:</div>
	<div class="logos">
		<a href="https://www.etsy.com/"><img src="<?php echo lidikart_asset( 'img/shops/etsy.png' ); ?>" alt="Etsy" style="height:30px"></a>
		<a href="https://www.saatchiart.com/"><img src="<?php echo lidikart_asset( 'img/shops/saatchiart.png' ); ?>" alt="Saatchi Art" style="height:24px"></a>
		<a href="https://fineartamerica.com/"><img src="<?php echo lidikart_asset( 'img/shops/fineartamerica.png' ); ?>" alt="Fine Art America" style="height:28px"></a>
		<a href="https://www.behance.net/"><img src="<?php echo lidikart_asset( 'img/shops/behance.png' ); ?>" alt="Behance" style="height:26px"></a>
	</div>
</section>

<section class="about-grid">
	<div>
		<h2>The artist &mdash; Lidiia Ma</h2>
		<p class="muted" style="max-width:620px">Lidiia paints the world she sees in her dreams: heroes of her own mythology, echoes of Ukrainian folklore and fairy tales that grew up with us. Painting, graphics, collage and wall murals. Now based near T&uuml;bingen, Germany.</p>
		<a class="link-underline" href="<?php echo esc_url( home_url( '/biography/' ) ); ?>">Read the biography &rarr;</a>
	</div>
	<img src="<?php echo lidikart_asset( 'img/ava.jpg' ); ?>" alt="Lidiia Ma" style="width:320px;height:380px">
</section>

<?php get_footer(); ?>
