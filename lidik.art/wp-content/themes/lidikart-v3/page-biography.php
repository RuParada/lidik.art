<?php
/* Template Name: Biography — page slug "biography" */
get_header(); ?>

<div class="bio-grid">
	<div>
		<img class="portrait" src="<?php echo lidikart_asset( 'img/ava.jpg' ); ?>" alt="Lidiia Ma">
		<div style="display:flex;gap:16px;margin-top:18px;justify-content:center">
			<a href="https://www.instagram.com/"><img src="<?php echo lidikart_asset( 'img/social/instagram.svg' ); ?>" alt="Instagram" style="height:20px;filter:brightness(0) invert(.75)"></a>
			<a href="https://www.facebook.com/"><img src="<?php echo lidikart_asset( 'img/social/facebook.svg' ); ?>" alt="Facebook" style="height:20px;filter:brightness(0) invert(.75)"></a>
			<a href="https://www.youtube.com/"><img src="<?php echo lidikart_asset( 'img/social/youtube.svg' ); ?>" alt="YouTube" style="height:20px;filter:brightness(0) invert(.75)"></a>
			<a href="https://www.behance.net/"><img src="<?php echo lidikart_asset( 'img/social/behance.svg' ); ?>" alt="Behance" style="height:20px;filter:brightness(0) invert(.75)"></a>
		</div>
	</div>
	<div>
		<h1>Lidiia Ma</h1>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="entry-content muted" style="font-size:16.5px;line-height:1.75;max-width:640px"><?php the_content(); ?></div>
		<?php endwhile; endif; ?>
		<h2 style="margin-top:34px">Exhibitions</h2>
		<div class="timeline">
			<!-- Fill in real exhibitions in the page editor, or edit here -->
			<div class="row"><span class="year">20__</span><div><b>Exhibition name</b><div class="muted2" style="font-size:13px">City, gallery</div></div></div>
			<div class="row"><span class="year">20__</span><div><b>Exhibition name</b><div class="muted2" style="font-size:13px">City, gallery</div></div></div>
			<div class="row"><span class="year">20__</span><div><b>Exhibition name</b><div class="muted2" style="font-size:13px">City, gallery</div></div></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
