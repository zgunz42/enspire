<div class="sharrre-container">
	<span><?php esc_html_e('Share','enspire'); ?></span>
	<div id="twitter" data-url="<?php echo the_permalink(); ?>" data-text="<?php echo the_title(); ?>" data-title="<?php esc_html_e('Tweet', 'enspire'); ?>"></div>
	<div id="facebook" data-url="<?php echo the_permalink(); ?>" data-text="<?php echo the_title(); ?>" data-title="<?php esc_html_e('Like', 'enspire'); ?>"></div>
	<div id="pinterest" data-url="<?php echo the_permalink(); ?>" data-text="<?php echo the_title(); ?>" data-title="<?php esc_html_e('Pin It', 'enspire'); ?>"></div>
	<div id="linkedin" data-url="<?php echo the_permalink(); ?>" data-text="<?php echo the_title(); ?>" data-title="<?php esc_html_e('Share on LinkedIn', 'enspire'); ?>"></div>
</div><!--/.sharrre-container-->

<script type="text/javascript">
	// Sharrre
	jQuery(document).ready(function(){
		jQuery('#twitter').sharrre({
			share: {
				twitter: true
			},
			template: '<a class="box group" href="#"><div class="count" href="#"><i class="fa fa-plus"></i></div><div class="share"><i class="fa fa-twitter"></i></div></a>',
			enableHover: false,
			enableTracking: true,
			buttons: { twitter: {via: '<?php echo esc_attr( get_theme_mod('twitter-username') ); ?>'}},
			click: function(api, options){
				api.simulateClick();
				api.openPopup('twitter');
			}
		});
		jQuery('#facebook').sharrre({
			share: {
				facebook: true
			},
			template: '<a class="box group" href="#"><div class="count" href="#">{total}</div><div class="share"><i class="fa fa-facebook-square"></i></div></a>',
			enableHover: false,
			enableTracking: true,
			buttons:{layout: 'box_count'},
			click: function(api, options){
				api.simulateClick();
				api.openPopup('facebook');
			}
		});
		jQuery('#pinterest').sharrre({
			share: {
				pinterest: true
			},
			template: '<a class="box group" href="#"><div class="count" href="#">{total}</div><div class="share"><i class="fa fa-pinterest"></i></div></a>',
			enableHover: false,
			enableTracking: true,
			buttons: {
			pinterest: {
				description: '<?php echo the_title(); ?>'<?php if( has_post_thumbnail() ){ ?>,media: '<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'<?php } ?>
				}
			},
			click: function(api, options){
				api.simulateClick();
				api.openPopup('pinterest');
			}
		});
		jQuery('#linkedin').sharrre({
			share: {
				linkedin: true
			},
			template: '<a class="box group" href="#"><div class="count" href="#">{total}</div><div class="share"><i class="fa fa-linkedin-square"></i></div></a>',
			enableHover: false,
			enableTracking: true,
			buttons: {
			linkedin: {
				description: '<?php echo the_title(); ?>'<?php if( has_post_thumbnail() ){ ?>,media: '<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>'<?php } ?>
				}
			},
			click: function(api, options){
				api.simulateClick();
				api.openPopup('linkedin');
			}
		});
		
		<?php if ( get_theme_mod( 'sharrre-scrollable' ) == 'on' ): ?>		
			// Scrollable sharrre bar, contributed by Erik Frye. Awesome!
			var shareContainer = jQuery(".sharrre-container"),
			header = jQuery('#header'),
			postEntry = jQuery('.entry'),
			$window = jQuery(window),
			distanceFromTop = 20,
			startSharePosition = shareContainer.offset(),
			contentBottom = postEntry.offset().top + postEntry.outerHeight(),
			topOfTemplate = header.offset().top;
			getTopSpacing();

			shareScroll = function(){
				if($window.width() > 719){	
					var scrollTop = $window.scrollTop() + topOfTemplate,
					stopLocation = contentBottom - (shareContainer.outerHeight() + topSpacing);
					if(scrollTop > stopLocation){
						shareContainer.offset({top: contentBottom - shareContainer.outerHeight(),left: startSharePosition.left});
					}
					else if(scrollTop >= postEntry.offset().top-topSpacing){
						shareContainer.offset({top: scrollTop + topSpacing, left: startSharePosition.left});
					}else if(scrollTop < startSharePosition.top+(topSpacing-1)){
						shareContainer.offset({top: startSharePosition.top,left:startSharePosition.left});
					}
				}
			},

			shareMove = function(){
				startSharePosition = shareContainer.offset();
				contentBottom = postEntry.offset().top + postEntry.outerHeight();
				topOfTemplate = header.offset().top;
				getTopSpacing();
			};

			/* As new images load the page content body gets longer. The bottom of the content area needs to be adjusted in case images are still loading. */
			setTimeout(function() {
				contentBottom = postEntry.offset().top + postEntry.outerHeight();
			}, 2000);

			if (window.addEventListener) {
				window.addEventListener('scroll', shareScroll, false);
				window.addEventListener('resize', shareMove, false);
			} else if (window.attachEvent) {
				window.attachEvent('onscroll', shareScroll);
				window.attachEvent('onresize', shareMove);
			}

			function getTopSpacing(){
				if($window.width() > 1024)
					topSpacing = distanceFromTop + jQuery('.nav-wrap').outerHeight();
				else
					topSpacing = distanceFromTop;
			}
		<?php endif; ?>
		
	});
</script>