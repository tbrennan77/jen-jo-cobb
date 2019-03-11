			
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form" id="mainsearch" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<input class="morphsearch-input" type="search" name="s" placeholder="" />
					<button class="morphsearch-submit" type="submit" form="mainsearch" id="btnsubmit" onclick="this.form.submit()">Search</button>
				</form>
				<div class="morphsearch-content">
					<div class="search-column">
						<h2>Getting Started</h2>
						<?php $recommended = new WP_Query(array('posts_per_page'=>5, 'category' => 50, 'order'=>'DESC'));
							while ($recommended->have_posts()) : $recommended->the_post(); ?>
							<a class="search-media-object" href="<?php the_permalink(); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
								<h3><?php the_title(); ?></h3>
							</a>
						 <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="search-column">
						<h2>Popular</h2>
						<?php $popular = new WP_Query(array('posts_per_page'=>5, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
							while ($popular->have_posts()) : $popular->the_post(); ?>
							<a class="search-media-object" href="<?php the_permalink(); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
								<h3><?php the_title(); ?></h3>
							</a>
						 <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="search-column">
						<h2>Latest</h2>
						<?php $recent_posts = new WP_Query(array('posts_per_page'=>5, 'order'=>'DESC', 'numberposts' => '5' ));
							while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
								<a class="search-media-object" href="<?php the_permalink(); ?>">
								<img class="round" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
								<h3><?php the_title(); ?></h3>
							</a>
							<?php endwhile; 
							wp_reset_postdata();
						?>
					</div>
				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			<div class="overlay"></div>
					<script>
			(function() {
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );


				/***** for demo purposes only: don't allow to submit the form *****/
				morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			})();
		</script>