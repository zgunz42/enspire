				</div><!--/.main-inner-->
			</div><!--/.main-->			
		</div><!--/.container-->
	</div><!--/#page-->

	<footer id="footer">
		
		<?php if ( ot_get_option('footer-ads') == 'on' ): ?>
		<section id="footer-ads">
			<?php dynamic_sidebar( 'footer-ads' ); ?>
		</section><!--/#footer-ads-->
		<?php endif; ?>
		
		<?php // footer widgets
			$total = 4;
			if ( ot_get_option( 'footer-widgets' ) != '' ) {
				
				$total = ot_get_option( 'footer-widgets' );
				if( $total == 1) $class = 'one-full';
				if( $total == 2) $class = 'one-half';
				if( $total == 3) $class = 'one-third';
				if( $total == 4) $class = 'one-fourth';
				}

				if ( ( is_active_sidebar( 'footer-1' ) ||
					   is_active_sidebar( 'footer-2' ) ||
					   is_active_sidebar( 'footer-3' ) ||
					   is_active_sidebar( 'footer-4' ) ) && $total > 0 ) 
		{ ?>		
		<section class="container dark" id="footer-widgets">			
			<div class="pad group">
				<?php $i = 0; while ( $i < $total ) { $i++; ?>
					<?php if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
				
				<div class="footer-widget-<?php echo esc_attr( $i ); ?> grid <?php echo esc_attr( $class ); ?> <?php if ( $i == $total ) { echo 'last'; } ?>">
					<?php dynamic_sidebar( 'footer-' . $i ); ?>
				</div>
				
					<?php } ?>
				<?php } ?>
			</div><!--/.pad-->
		</section><!--/.container-->	
		<?php } ?>
			
		<section id="footer-bottom">
			<div class="container">				
				<a id="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>			
				<div class="pad group">
					
					<div class="grid one-half">
						
						<?php if ( ot_get_option('footer-logo') ): ?>
							<img id="footer-logo" src="<?php echo ot_get_option('footer-logo'); ?>" alt="<?php get_bloginfo('name'); ?>">
						<?php endif; ?>
						
						<div id="copyright">
							<?php if ( ot_get_option( 'copyright' ) ): ?>
								<p><?php echo esc_attr( ot_get_option( 'copyright' ) ); ?></p>
							<?php else: ?>
								<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'enspire' ); ?></p>
							<?php endif; ?>
						</div><!--/#copyright-->
						
						<?php if ( ot_get_option( 'credit' ) != 'off' ): ?>
						<div id="credit">
							<p><?php esc_html_e('Powered by','enspire'); ?> <a href="http://wordpress.org" rel="nofollow">WordPress</a>. <?php esc_html_e('Theme by','enspire'); ?> <a href="http://alxmedia.se" rel="nofollow">Alx</a>.</p>
						</div><!--/#credit-->
						<?php endif; ?>
						
					</div>
					
					<div class="grid one-half last">	
						<?php alx_social_links() ; ?>
					</div>
				
				</div><!--/.pad-->
			</div><!--/.container-->
		</section><!--/#footer-bottom-->
		
	</footer><!--/#footer-->

</div><!--/#wrapper-->

<?php wp_footer(); ?>
</body>
</html>