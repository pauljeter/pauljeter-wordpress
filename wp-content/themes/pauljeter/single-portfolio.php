<?php
remove_action('genesis_post_title', 'genesis_do_post_title');
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
add_action( 'genesis_post_content', 'pj_project_type_meta' );
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );


function pj_project_type_meta () {
	echo get_the_term_list( get_the_ID(), 'project_type', '<p class="project-type">Project Type: ', " | ","</p>" ); }
?>

<?php genesis(); ?>