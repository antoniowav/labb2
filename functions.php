<?php 


/* Here I remove the header and the sidebar if the cart is not empty */
function remove_header_sidebar_checkout() {
    if( is_checkout()){
    if ( ! WC()->cart->is_empty() ) { 

        remove_action( 'storefront_page', 'storefront_page_header', 10 );
        remove_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );
        remove_action( 'storefront_header', 'storefront_header_container', 0);
        remove_action( 'storefront_header', 'storefront_skip_links', 5 );
        remove_action( 'storefront_header', 'storefront_site_branding', 20 );
        remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
        remove_action( 'storefront_header', 'storefront_product_search', 40 );
        remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
        remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
        remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
        remove_action( 'storefront_header', 'storefront_header_cart', 60 );
        remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
        remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
}

}

/* Here I remove the sidebar from the cart */
function remove_sidebar_cart(){
    if(is_cart()){
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
}
/* Adding the action for the functions above */
add_action( 'wp_head', 'remove_header_sidebar_checkout');
add_action( 'wp_head', 'remove_sidebar_cart');

// load css into the website's front-end
function enqueue_style() {
    wp_enqueue_style( 'style', get_stylesheet_uri() . '/style.css' ); 
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' );

?>