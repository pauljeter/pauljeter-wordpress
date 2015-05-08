<?php

//remove_action('genesis_post_title', 'genesis_do_post_title');
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
add_action('genesis_before_post_title','pj_post_image');
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

function pj_post_image() {
	the_post_thumbnail( array(600,300,true) );
}

genesis();
