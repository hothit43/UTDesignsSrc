<?php
/**
 * Functions to extend the WP Rest API
 *
 * @package WordPress
 */
/*fix:

/**
 * Register custom fields for GET requests.
 *
 * Ref: https://developer.wordpress.org/reference/functions/register_rest_field/
 */

add_action( 'rest_api_init', 'msoto_extend_api_response' );
function msoto_extend_api_response() {
	register_rest_field(
		array( 'post' ), // post types.
		'vue_meta', // name of the new key.
		array(
			'get_callback' => 'vue_get_post_meta_fields',
			'update_callback' => null,
			'schema' => null
		)
	);
}

/**
 * GET callback for the "vue_meta" field defined above.
 *
 * @param array $post_object Details of the current post.
 * @param string $field_name Field Name set in register_rest_field().
 * @param WP_REST_Request $request Current request.
 *
 * @return mixed
 */
function vue_get_post_meta_fields( $post_object, $field_name, $request ) {

	// make additional fields available in the response using an associative array.
	$additional_post_data = array();
	$terms = array();
	$term_links = array();
	$post_id = $post_object['id']; // get the post id.
	//var_dump($post_object);
	foreach ( $post_object['categories'] as $category_id ) {
		$term_data = get_category( $category_id );
		$term_name = $term_data->cat_name;
		$term_name = filter_var($term_name, FILTER_SANITIZE_STRING);
		$term_url = get_term_link( $term_data->slug, $term_data->taxonomy );
		$term_link = "<a href=\"$term_url\">$term_name</a>";
		
		$terms[] = $term_name;
		$term_links[] = $term_link;
	
	}

	// add categories, custom excerpt, featured image to the api response.
	$img_id  = get_post_thumbnail_id( $post_id );
	$img_alt = get_post_meta( $img_id,'_wp_attachment_image_alt', true );

	//$additional_post_data['custom_excerpt'] = wp_trim_words($post_object['excerpt']['raw'], 25,' &hellip;');
	//$additional_post_data['content'] = $post_object['content']['raw'];
	$additional_post_data['terms'] = $terms;
	$additional_post_data['term_links'] = $term_links;
	$additional_post_data['featuredmedia_alt'] = $img_alt;
	$additional_post_data['featureddesk_url'] = get_the_post_thumbnail_url($post_id,'project-desk');
	$additional_post_data['featuredlap_url'] = get_the_post_thumbnail_url($post_id,'project-lap');
	//$additional_post_data['featuredmobile_url'] = get_the_post_thumbnail_url($post_id,'project-mobile');
	//$additional_post_data['featuredfull_url'] = get_the_post_thumbnail_url($post_id,'project-full');
	//acf
	$acf = get_post_meta($post_id);
	//var_dump($acf);
	if (array_key_exists('project_has_url', $acf)) {
		$additional_post_data['acf']['project_url'] = $acf['project_url'][0];
		$additional_post_data['acf']['project_link'] = $acf['project_has_url'][0];
	}
	if (array_key_exists('mobile_image', $acf)) {
		$additional_post_data['acf']['mobile_url'] = wp_get_attachment_url($acf['mobile_image'][0]);
		$additional_post_data['acf']['featured_main_url'] = wp_get_attachment_url($acf['project_large_image'][0]);
	}
	
	// return data to the get_callback.
	// this data will be made available in the key "vue_meta".
	return $additional_post_data;
}
