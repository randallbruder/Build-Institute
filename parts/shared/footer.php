	
	<div id="footer-clear">
		<footer>
			<div id="footer-contact">
						
				<?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
					<?php dynamic_sidebar( 'footer_left' ); ?>
				<?php endif; ?>
	
			</div>
			
			<div id="footer-social">
				<div id="footer-social-icons">
					<a href="<?php echo home_url(); ?>/events/"><span class="icon icon-calendar"></span></a>
					<a href="https://www.facebook.com/StartWithBuild" target="_blank"><span class="icon icon-facebook"></span></a>
					<a href="https://twitter.com/StartWithBuild" target="_blank"><span class="icon icon-twitter"></span></a>
				</div>
				<div id="footer-social-events">
					<?php if ( is_active_sidebar( 'footer_middle' ) ) : ?>
						<?php dynamic_sidebar( 'footer_middle' ); ?>
					<?php endif; ?>
									
				</div>
				<div id="footer-social-facebook">
					<h3>Recent Facebook Posts</h3>
				</div>
				<div id="footer-social-twitter">
					<h3>Recent Tweets</h3>
				</div>
			</div>
			
			<div id="footer-right">
				<?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
					<?php dynamic_sidebar( 'footer_right' ); ?>
				<?php endif; ?>
			</div>
		</footer>
	</div>
