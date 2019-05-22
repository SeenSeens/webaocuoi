<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Just another WordPress site" />
    <link rel="profile" href="http://gmgp.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script id="mfn-dnmc-config-js">
        //<![CDATA[
        //window.mfn_ajax = "/wp-admin/admin-ajax.php";
        window.mfn = {
            mobile_init: 1240,
            nicescroll: 40,
            parallax: "translate3d",
            responsive: 1,
            retina_js: 0
        };
        window.mfn_prettyphoto = {
            disable: false,
            disableMobile: false,
            title: false,
            style: "pp_default",
            width: 0,
            height: 0
        };
        window.mfn_sliders = {
            blog: 0,
            clients: 0,
            offer: 0,
            portfolio: 0,
            shop: 0,
            slider: 0,
            testimonials: 0
        };
        //]]>
    </script>
    <SCRIPT LANGUAGE = "Javascript">
    $(document).ready(function() {
    $("a[href*='#']:not([href='#])").click(function() {
        let target = $(this).attr("href");
        $('html,body').stop().animate({
        scrollTop: $(target).offset().top
        }, 1000);
        event.preventDefault();
    });
    });</SCRIPT>
    <?php wp_head(); ?>
</head>

<?php 
//home page-template-default page page-id-4 color-custom style-default layout-full-width button-flat header-stack header-center sticky-header sticky-white ab-show subheader-both-left mobile-tb-left mobile-mini-mr-ll wpb-js-composer js-comp-ver-5.0.1 vc_responsive nice-scroll customize-support
?>
<body <?php body_class( 'color-custom style-default layout-full-width button-flat header-stack header-center sticky-header sticky-white ab-show subheader-both-left mobile-tb-left mobile-mini-mr-ll wpb-js-composer js-comp-ver-5.0.1 vc_responsive nice-scroll customize-support' ); ?>>
    <div id="Wrapper">
        <!-- #Header_bg -->
        <?php get_template_part( 'template-parts/header/header', get_post_format() ); ?>