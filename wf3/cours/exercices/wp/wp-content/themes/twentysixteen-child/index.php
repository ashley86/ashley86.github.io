<?php
    get_header();
?>

<?php
    $args = [
        'post_per_page' => 4,
        'orderby'       => 'rand'
    ];

$sticky = get_option('sticky_posts');
var_dump( $sticky );

$recent_posts = new wp_query( $args );
    
    if( $recent_posts->have_posts() )
    {
        ?><ul><?php
        while( $recent_posts->have_posts() ){
            $recent_posts->the_post();


            the_post_thumbnail( 'thumbnail' );
            
            ?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php
            
        }
        ?></ul><?php
    }
    
    wp_reset_query();
?>

<?php
    get_footer();
?>