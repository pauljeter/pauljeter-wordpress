<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_project_loop');

/*add_filter('genesis_pre_get_option_site_layout', 'force_term_layout');
function force_term_layout($layout) {
    if ( is_page() )
         $layout = 'full-width-content';
    return $layout;
}*/

function custom_project_loop() {
    global $query_args;  // any wp_query() args
    $args= array( 'project_type' => 'web-design' , 'posts_per_page' => 20 );
query_posts ($args);

?>
 
<h1 class="page-title">Portfolio: Web Design</h1>
<h3 class="portfolio">My Web Design Portfolio contains some of my latest Web Design projects and project details. To hire me for a project, visit my freelance company: <a href="http://www.headturningmedia.com/#quote-form" target="_blank">Head Turning Media</a>. To hire me to be a part of your company's team, <a href="/resume" target="_self">View My Resume and Contact Me Today!</a></h3>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
 
<div class="project-entry">

<h3 class="entry-title"><?php the_title(); ?></a></h3>

<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'portfolio' ); ?></a>

<a class="project-details" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">View Project Details »</a>

<div class="project-type">

<?php echo get_the_term_list( get_the_ID(), 'project_type', "Project Type: ", " | " ) ?>

</div>
 
</div>
 
<?php endwhile; ?>

<?php endif; ?>
 
<!--
<div id="quote-form" class="portfolio">
    <div id="quote-banner">
        <img src="/media/web-design-quote-banner.png">
    </div>
   <?php echo do_shortcode('[contact-form-7 id="68" title="Quote"]'); ?>
</div>
-->
<?php
}
genesis();
