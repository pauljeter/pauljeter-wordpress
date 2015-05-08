<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
printf( __(  '%s', 'twentyten' ), '<h1>:Posts by : ' . $term->name . '</h1>' );