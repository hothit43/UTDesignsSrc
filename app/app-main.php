<?php
add_filter( 'admin_bar_menu', 'replace_howdy', 25 );
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Greetings Master', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_theme_support( 'post-thumbnails', 'post' );

update_option( 'thumbnail_size_w', 320);
update_option( 'thumbnail_size_h', 320,  );
update_option( 'thumbnail_crop', 1 );

update_option( 'medium_size_w', 384 );
update_option( 'medium_size_h', 384 );
update_option( 'medium_crop', 1 );

update_option( 'large_size_w', 512 );
update_option( 'large_size_h', 512 );
update_option( 'large_crop', 1 );

add_image_size( 'project-mobile', 362, 105, array( 'left', 'top' ) );
add_image_size( 'project-lap', 368, 210, true );
add_image_size( 'project-desk', 436, 358, true );
add_image_size( 'project-full', 600, 250, true );



/**
 * Remove JQuery migrate
 * https://joewp.com/en/remove-jquery-migrate/
 */
add_action('wp_default_scripts', function ($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
});