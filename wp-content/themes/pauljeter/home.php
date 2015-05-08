<?php

/** Add the home featured section */
add_action( 'genesis_before_loop', 'pauljeter_home_featured' );
function pauljeter_home_featured() {
	
    genesis_widget_area( 'featured', array(
    'before' => '<div class="home-featured widget-area">',
    ) );
	
}

/** Remove the post meta function */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

genesis();