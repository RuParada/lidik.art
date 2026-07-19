<?php
/* Template Name: Wall Murals — page slug "murals" */
get_header(); ?>

<div class="section hero" style="overflow:hidden">
	<h1>Wall Murals &mdash; Wandmalerei</h1>
	<p class="muted" style="max-width:640px;font-size:16.5px">A hand-painted wall turns a room into a story. I paint murals in homes, caf&eacute;s, offices and children's rooms &mdash; from a single accent wall to a whole interior.</p>

	<div class="stat-cards">
		<div class="stat-card"><div class="big">&euro;18<span> / hour</span></div><p>Transparent hourly rate (Stundensatz). You pay only for painting time; paint and materials by agreement.</p></div>
		<div class="stat-card"><div class="big">50 km</div><p>Landkreis T&uuml;bingen and up to 50 km around: Reutlingen, Rottenburg, Herrenberg, Stuttgart.</p></div>
		<div class="stat-card"><div class="big">Free</div><p>Estimate and sketch consultation (Kostenvoranschlag). Send a photo of your wall and your idea.</p></div>
	</div>

	<div class="steps">
		<div class="step"><span class="n">1</span><p><b>Idea &amp; estimate.</b> You send a wall photo and wishes, I reply with a time estimate.</p></div>
		<div class="step"><span class="n">2</span><p><b>Sketch.</b> A digital sketch of the mural on a photo of your actual wall.</p></div>
		<div class="step"><span class="n">3</span><p><b>Painting.</b> I bring everything needed and paint on agreed days.</p></div>
	</div>

	<h2>Portfolio</h2>
	<?php if ( get_the_content() ) : ?>
		<div class="entry-content"><?php the_post(); the_content(); ?></div>
	<?php else : ?>
		<div class="mural-slots">
			<div class="mural-slot">Add mural photos to this page in the WordPress editor</div>
			<div class="mural-slot">Mural photo</div>
			<div class="mural-slot">Mural photo</div>
		</div>
	<?php endif; ?>

	<p style="margin-top:20px">
		<a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request a free estimate</a>
		<span style="margin-left:18px;font-size:13.5px;color:var(--mut2)">or write on WhatsApp / e-mail &mdash; English, Deutsch, &#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072;</span>
	</p>
</div>

<?php get_footer(); ?>
