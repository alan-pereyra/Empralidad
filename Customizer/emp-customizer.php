<?php
function empralidad_customize_register($wp_customize){
	include get_template_directory().'/Customizer/components/index.php';
	include get_template_directory().'/Customizer/woocommerce/index.php';
	include get_template_directory().'/Customizer/frontpage/titles.php';
	include get_template_directory().'/Customizer/frontpage/sliders.php';
	include get_template_directory().'/Customizer/frontpage/secondary-banners.php';
	include get_template_directory().'/Customizer/frontpage/contents.php';
	include get_template_directory().'/Customizer/analytics/index.php';
}

add_action('customize_register', 'empralidad_customize_register');
function sanitize_number( $input ) {
return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);}
function sanitize_string( $input ) {
return filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);}
function sanitize_url_( $input ) {
return filter_var($input, FILTER_SANITIZE_URL );}
function sanitize_encoded( $input ) {
return filter_var($input, FILTER_UNSAFE_RAW);}
 ?>
