<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<?php wp_head(); ?>
		<link rel="image_src" href="<?php echo home_url(); ?>/facebook.jpg" />
		<meta name="twitter:widgets:csp" content="on">
	</head>
	<body <?php body_class(); ?>>
		
		<div id="st-container" class="st-container">
			
			<nav class="st-menu st-effect-4" id="search">
				
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>/">
					<input type="text" name="s" id="s" placeholder=" search" autocomplete="off" />
					<p>Enter your search to the left</p>
					<input type="submit" id="searchsubmit" value="<?php esc_attr_x( 'Search', 'submit button' ); ?>" />
				</form>
			</nav>
			
			<!-- Begin MailChimp Signup Form -->
			<nav class="st-menu st-effect-5" id="newsletter">
				
				<div id="newsletter-form">
					<form action="http://buildinstitute.us6.list-manage.com/subscribe/post?u=c11eb615c313e7a2ded933d44&amp;id=a1ed540986" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder=" email" autocomplete="off" />
						
						<div id="newsletter-options">
						
							I would like to hear about:<br />
							<div class="newsletter-select">
								<input type="checkbox" value="1" name="group[11425][1]" id="mce-group[11425]-11425-0">
								<label for="mce-group[11425]-11425-0">Open City</label>
							</div>
							<div class="newsletter-select">
								<input type="checkbox" value="2" name="group[11425][2]" id="mce-group[11425]-11425-1">
								<label for="mce-group[11425]-11425-1">Build News</label>
							</div>
						
						</div>
						
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;"><input type="text" name="b_c11eb615c313e7a2ded933d44_a1ed540986" tabindex="-1" value=""></div>
						
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</form>
					
					<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				</div>
				<div id="newsletter-sucess">
					<p>Thank you! To complete the subscription process, please click the confirmation link in the email we just sent you.</p>
				</div>
				
			</nav>
			<!--End mc_embed_signup-->

			<!-- content push wrapper -->
			<div class="st-pusher">
				
				<div class="st-content"><!-- this is the wrapper for the content -->
					<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
						
						
						<div class="main clearfix">