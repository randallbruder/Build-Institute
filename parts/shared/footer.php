	
	<div id="footer-clear">
		<footer>
			<div id="footer-contact">
						
				<?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
					<?php dynamic_sidebar( 'footer_left' ); ?>
				<?php endif; ?>
	
			</div>
			
			<div id="footer-social">
				<div id="footer-social-icons">
					<a href="<?php echo home_url(); ?>/events/"><span class="icon icon-calendar" id="footer-icon-events"></span></a>
					<a href="https://www.facebook.com/StartWithBuild" target="_blank"><span class="icon icon-facebook" id="footer-icon-facebook"></span></a>
					<a href="https://twitter.com/StartWithBuild" target="_blank"><span class="icon icon-twitter" id="footer-icon-twitter"></span></a>
				</div>
				<div id="footer-social-events">
					<?php if ( is_active_sidebar( 'footer_middle' ) ) : ?>
						<?php dynamic_sidebar( 'footer_middle' ); ?>
					<?php endif; ?>
									
				</div>
				<div id="footer-social-facebook">
					<h3>Latest Facebook Post</h3>
					
					<?php
					$fb_posts = fb_get_last_posts(10);
					$i = 0;
					foreach($fb_posts as $fb_post):
						if ($fb_post['post_type'] != 'status'):
							if ($i < 1): ?>
								<div class="post">
									<span class="date"><?php print date(get_option('date_format'), strtotime($fb_post['created_time']));?></span>
									<p ><?php print esc_html($fb_post['message']); ?> <a href="<?php print $fb_post['permalink'];?>">Original post</a></p>
								</div>
							<?php $i++;
							endif;
						endif;
					endforeach; ?>
					
				</div>
				<div id="footer-social-twitter">
					<h3>Latest Tweet</h3>
					<?php fetchTweets( array( 'screen_name' => 'StartWithBuild', 'count' => 1, 'avatar_size' => 0 ) ); ?>
				</div>
			</div>
			
			<div id="footer-right">
				<?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
					<?php dynamic_sidebar( 'footer_right' ); ?>
				<?php endif; ?>
				
			</div>
		</footer>
	</div>
