<?php


function anima_flippin_postcards($atts = [])
{

    $logo = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($logo, 'full');
    $default_logo = $image[0];

    $atts = array_change_key_case((array)$atts, CASE_LOWER);
    $wporg_atts = shortcode_atts([
        'col-md' => $atts['col-md'],
        'col-lg' => $atts['col-lg'],
        'count' => $atts['count'],
    ], $atts);

    $flipcards = '<div class="row">';
    $q = new WP_Query(array(
        'posts_per_page' => $wporg_atts['count'],
    ));
    while ($q->have_posts()) {
        $q->the_post();
        $flipcards .= '<div class="col-lg-' . $wporg_atts['col-lg'] . ' col-md-' . $wporg_atts['col-md'] . '">';
        $flipcards .= '<div class="card">';

        $flipcards .= '<div class="flip-card">';
        $flipcards .= '<div class="flip-card-inner">';

        $flipcards .= '<div class="flip-card-font">';
        $flipcards .= '<a class="card-img-top" href=' . $default_logo . '></a>';
        $flipcards .= '</div>';

        $flipcards .= '<div class="flip-card-back">';
        $flipcards .= '<img src="' . $default_logo . '">';
        $flipcards .= '</div>';

        $flipcards .= '</div>';
        $flipcards .= '</div>';

        $flipcards .= '</div>';
        $flipcards .= '</div>';
    }
    $flipcards .= '</div>';
    wp_reset_postdata();
    return $flipcards;
}
add_shortcode('anima_flippin_postcards', 'anima_flippin_postcards');
