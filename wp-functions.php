<?php


// Year shortcode
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');


// CTA shortcode
function callout_cta_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'title' => 'no foo',
            'body' => 'default bar',
        ), $atts, 'callout-cta');

    return '<div class="callout-cta"><h4>' . $atts['title'] . '</h4><p> ' . $atts['body'] . '</p></div>';
}
add_shortcode( 'callout-cta', 'callout_cta_shortcode' );


// Author shortcode
function author_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'image' => 'no foo',
            'auth' => 'default bar',
            'contrib' => 'default bar1',
            'bio' => 'default bar2',
            'twitter' => 'default bar3',
            'linkedin' => 'default bar4',
        ), $atts, 'callout-author');

return '<div class="floatl author-image"><img src="' . $atts['image'] . '"/></div><div class="floatl author-deets"><div class="dflex author-deets-top"><div class="floatl author-name">' . $atts['auth'] . '</div><div class="floatl author-contributors"><i class="fas fa-user-friends"></i></div></div><div class="dflex author-deets-middle"><div class="author-bio"><p>' . $atts['bio'] . '</p></div></div><div class="dflex author-deets-bottom"><div class="floatl author-twitter"><a href="https://twitter.com/' . $atts['twitter'] . '" target="_blank"><i class="fab fa-twitter"></i></a></div><div class="floatl author-linkedin"><a href="https://www.linkedin.com/in/' . $atts['linkedin'] . '" target="_blank"><i class="fab fa-linkedin"></i></a></div></div></div></div>';
}
add_shortcode( 'callout-author', 'author_shortcode' );  



// Review shortcode
function review_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'image' => 'no foo',
            'name' => 'default bar',
            'rating' => 'default bar1',
            'tally' => 'default bar2',
            'link' => 'default bar3',
            'write' => 'default bar4',
        ), $atts, 'review');

return '<div class="review-box"><div class="review-left"><div class="review-image"><img src="' . $atts['image'] . '"></div></div><div class="review-right"><div class="review-name">' . $atts['name'] . '</div><div class="review-rating">' . $atts['rating'] . '</div><div class="review-tally">Based on ' . $atts['tally'] . ' reviews</div><div class="review-link"><a href="' . $atts['link'] . '" target="_blank:">See all reviews</a></div><div class="review-write"><a href="' . $atts['write'] . '">Write a review</a></div></div></div>';
}
add_shortcode( 'review', 'review_shortcode' );  


// Add custom class field to all pages (works alongside ACF)
add_filter( 'body_class', 'custom_body_class' );
function custom_body_class( array $classes ) {
	$new_class = is_page() ? get_post_meta( get_the_ID(), 'body_class', true ) : null;

	if ( $new_class ) {
		$classes[] = $new_class;
	}

	return $classes;
}


// Make Gravity Forms jump to submission message 
add_filter( 'gform_confirmation_anchor', '__return_true' );


/* Custom Post Type Archives */
function my_cptui_add_post_types_to_archives( $query ) {
	// We do not want unintended consequences.
	if ( is_admin() || ! $query->is_main_query() ) {
		return;    
	}

	if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$cptui_post_types = cptui_get_post_type_slugs();

		$query->set(
			'post_type',
			array_merge(
				array( 'post' ),
				$cptui_post_types
			)
		);
	}
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_archives' );


?>
