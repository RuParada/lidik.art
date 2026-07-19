<?php
/* Template Name: Contact — page slug "contact".
 * The form below is markup only. Recommended: install Contact Form 7 or WPForms,
 * then replace the <form> block with the plugin shortcode via the_content(). */
get_header(); ?>

<div class="section" style="display:grid;grid-template-columns:1fr 1fr;gap:64px">
	<div>
		<h1>Contact</h1>
		<p class="muted" style="max-width:460px;font-size:16.5px">A question about a painting, a commission or a wall mural &mdash; write in English, Deutsch or &#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1086;&#1102;. I usually reply within a day.</p>
		<div style="display:flex;flex-direction:column;gap:14px;font-size:15px">
			<div style="display:flex;gap:12px;align-items:center"><img src="<?php echo lidikart_asset( 'img/social/mail.svg' ); ?>" alt="" style="height:20px;filter:brightness(0) invert(.75)"><a href="mailto:hello@lidik.art">hello@lidik.art</a></div>
			<div style="display:flex;gap:12px;align-items:center"><img src="<?php echo lidikart_asset( 'img/social/instagram.svg' ); ?>" alt="" style="height:20px;filter:brightness(0) invert(.75)"><a href="https://www.instagram.com/">@lidik.art</a></div>
			<div style="display:flex;gap:12px;align-items:center"><img src="<?php echo lidikart_asset( 'img/social/behance.svg' ); ?>" alt="" style="height:20px;filter:brightness(0) invert(.75)"><a href="https://www.behance.net/">behance.net/lidikart</a></div>
		</div>
		<div class="stat-card" style="margin-top:34px;max-width:460px;font-size:13.5px;color:var(--mut)">Buying from Germany or the EU? Originals ship insured from T&uuml;bingen. Prints are fulfilled by Fine Art America worldwide.</div>
	</div>
	<div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( get_the_content() ) { the_content(); } endwhile; endif; ?>
		<form class="form" action="mailto:hello@lidik.art" method="post" enctype="text/plain">
			<div class="form-row">
				<label>Name<input type="text" name="name" placeholder="Your name"></label>
				<label>E-mail<input type="email" name="email" placeholder="you@example.com"></label>
			</div>
			<label>What is it about?
				<select name="topic">
					<option>Buying a painting</option>
					<option>Wall mural (Wandmalerei)</option>
					<option>Commission / collaboration</option>
					<option>Other</option>
				</select>
			</label>
			<label>Message<textarea rows="6" name="message" placeholder="Tell me about your idea &mdash; for murals, attach a photo of the wall in the e-mail"></textarea></label>
			<button class="btn" type="submit" style="align-self:flex-start">Send message</button>
		</form>
	</div>
</div>

<?php get_footer(); ?>
