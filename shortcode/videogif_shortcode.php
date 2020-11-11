<?

// Video gif shortcode
function videogif($atts = [])
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    // override default attributes with user attributes
    $wporg_atts = shortcode_atts([
        'mp4' => $atts['mp4'],
        'style' => null,
        'controls' => False
    ], $atts);

    // build output
    $o = '';
    $o .= '<video autoplay loop muted playsinline ';
    if ($wporg_atts['controls']) $o .= 'controls ';
    $o .= 'class="videogif"';
    if (!is_null($wporg_atts['style'])) $o .= 'style="' . $wporg_atts['style'] . '" ';
    $o .= '><source src="' . $wporg_atts['mp4'] . '" type="video/mp4" />';
    $o .= '<p>Your browser does not support the video element.</p></video>';

    // return output
    return $o;
}
add_shortcode('videogif', 'videogif');


function videogif_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'videogif', $plugin_url . 'css/videogif.css' );
}
add_action( 'wp_enqueue_scripts', 'videogif_load_plugin_css' );