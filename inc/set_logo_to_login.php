<?php

function wpb_login_logo()

{
    $logo = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($logo, 'full');
    $default_logo = $image[0];
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("<?php echo $default_logo; ?>");
            background-repeat: no-repeat;
            height:130px;
            width:100%;
            background-size: 300px 100px;
        }
    </style>

<?php }
add_action('login_enqueue_scripts', 'wpb_login_logo');

function wpb_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
    return 'Your Site Name and Info';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');