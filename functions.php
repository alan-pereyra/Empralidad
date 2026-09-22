<?php
// 0) Includes
// 1) Main menu
// 2) Widgets
// 3) Includes
// 4) Css dinamicos
// 5) Content width
// 6) Add theme support
// 7) Coment reply
// 8) Walker class
// 9) Wp link pages
// 10) Custom post type
// 11) WooCommerce custom
// 12) GitHub updates
// 13) Fix admin bar on frontend


// 0) Includes
get_template_part( 'Customizer/emp-customizer' );
get_template_part( 'plugins/emp-shortcodes' );
get_template_part( 'plugins/emp-cata' );
get_template_part( 'plugins/emp-carousel' );
get_template_part('includes/enqueue-scripts');
// get_template_part('includes/PWA/manifest');

// 1) Main menu
if (function_exists('register_nav_menus')) {
	register_nav_menus (array('superior' => 'Menu Principal'));
}

// 2) Widgets
function emp_sidebar() {
	register_sidebar(
      array(
        'id'            => 'homepage1',
        'name'          => __( 'Sidebar homepage (inferior)', 'empralidad' ),
        'description'   => __( 'Se ubica antes del footer', 'empralidad' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s my-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title-dark">',
        'after_title'   => '</h3>'
      )
    );
  register_sidebar(
    array(
      'id'            => 'footer',
      'name'          => __( 'Sidebar del footer', 'empralidad' ),
      'description'   => __( 'Se ubica debajo de las paginas y entradas.', 'empralidad' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s my-3">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>'
    )
  );
}
add_action( 'widgets_init', 'emp_sidebar' );

// 3) Includes

// 4) Dinamics Css
function emp_theme_customize_css(){
	include get_template_directory().'/Customizer/emp-styles.php';
}
add_action( 'wp_head', 'emp_theme_customize_css');

// 5) content width
	if ( ! isset( $content_width ) ) {
		$content_width = 660;
	}

// 6) add theme support
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support('category-thumbnails');
add_theme_support('post-formats', array('video', 'image', 'aside', 'audio'));
add_post_type_support( 'page', 'excerpt' );


// 7) comment reply
function emp_enqueue_comments_reply() {

  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'emp_enqueue_comments_reply' );

// 8) Walker class
	class Walker_Nav_Primary extends Walker_Nav_menu {

		function start_lvl( &$output, $depth = 0, $args = array()){ //ul
			$indent = str_repeat("\t",$depth);
			$submenu = ($depth > 0) ? ' sub-menu' : '';
			$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span

			$indent = ( $depth ) ? str_repeat("\t",$depth) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
			$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;
			if( $depth && $args->walker->has_children ){
				$classes[] = 'dropdown-submenu';
			}

			$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr($class_names) . '"';

			$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$on_click = ( $depth == 0 && $args->walker->has_children ) ? '' : 'onclick="openMobileMenu()"';

			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . $on_click .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

			$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}
	}
  // Class <a> main menu
  function clase_menu ($atts, $item, $args){
  	$class = 'nav-link font-weight-bold mx-2';
  	$atts ['class'] = $class;
  	return $atts;
  }
  add_filter('nav_menu_link_attributes','clase_menu', 10,3);

// 9) Wp link pages
$defaults = array(
	'before'           => '<p>' . __( 'Páginas:', 'empralidad' ),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'Número',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Proxima página', 'empralidad'),
	'previouspagelink' => __( 'Página anterior', 'empralidad' ),
	'pagelink'         => '%',
	'echo'             => 1
);

// 10) Custom post type
function emp_custom_post_types_init() {
	$labels = array(
		'name'               => _x( 'Landing Pages', 'Nombre general del tipo de post', 'empralidad' ),
		'singular_name'      => _x( 'Landing Page', 'Nombre singular', 'empralidad' ),
		'menu_name'          => _x( 'Landing Pages', 'admin menu', 'empralidad' ),
		'name_admin_bar'     => _x( 'Landing Pages', 'añadir nueva en admin bar', 'empralidad' ),
		'add_new'            => _x( 'Añadir nueva', 'Landing Page', 'empralidad' ),
		'add_new_item'       => __( 'Añadir nueva Landing Page', 'empralidad' ),
		'new_item'           => __( 'Nueva Landing Page', 'empralidad' ),
		'edit_item'          => __( 'Editar Landing Page', 'empralidad' ),
		'view_item'          => __( 'Ver Landing Page', 'empralidad' ),
		'all_items'          => __( 'Landing Pages', 'empralidad' ),
		'search_items'       => __( 'Buscar Landing Pages', 'empralidad' ),
		'parent_item_colon'  => __( 'Landing Page:', 'empralidad' ),
		'not_found'          => __( 'No encontrado.', 'empralidad' ),
		'not_found_in_trash' => __( 'No se en contraron en la papelera.', 'empralidad' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Descripcion.', 'empralidad' ),
		'menu_icon' 				 => 'dashicons-layout',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'landing-pages' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => true,
		'taxonomies'          => array( 'category' ),
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'categories')
	);

	register_post_type( 'landing_pages', $args );

	$labels = array(
		'name'               => _x( 'Páginas de contacto', 'Nombre general del tipo de post', 'empralidad' ),
		'singular_name'      => _x( 'Página de contacto', 'Nombre singular', 'empralidad' ),
		'menu_name'          => _x( 'Páginas de contacto', 'admin menu', 'empralidad' ),
		'name_admin_bar'     => _x( 'Páginas de contacto', 'añadir nueva en admin bar', 'empralidad' ),
		'add_new'            => _x( 'Añadir nueva', 'Página de contacto', 'empralidad' ),
		'add_new_item'       => __( 'Añadir nueva página de contacto', 'empralidad' ),
		'new_item'           => __( 'Nueva página de contacto', 'empralidad' ),
		'edit_item'          => __( 'Editar página de contacto', 'empralidad' ),
		'view_item'          => __( 'Ver página de contacto', 'empralidad' ),
		'all_items'          => __( 'Páginas de contacto', 'empralidad' ),
		'search_items'       => __( 'Buscar páginas de contacto', 'empralidad' ),
		'parent_item_colon'  => __( 'Página de contacto:', 'empralidad' ),
		'not_found'          => __( 'No encontrado.', 'empralidad' ),
		'not_found_in_trash' => __( 'No se en contraron en la papelera.', 'empralidad' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Descripcion.', 'empralidad' ),
		'menu_icon' 				 => 'dashicons-email',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'contact' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'contact', $args );
}
add_action( 'init', 'emp_custom_post_types_init' );

// 11) Woocomerce Custom
if (class_exists('WooCommerce')){
	function emp_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
      'thumbnail_image_width' => 600,
      'single_image_width'    => 600,

      'product_grid'          => array(
        'default_rows'    => 3,
        'min_rows'        => 1,
        'max_rows'        => 3,
        'default_columns' => 3,
        'min_columns'     => 3,
        'max_columns'     => 5,
      ),
    ) );
    add_theme_support( 'wc-product-gallery-slider' );
	}
  add_action( 'after_setup_theme', 'emp_add_woocommerce_support' );

	// enable gutenberg
	function activate_gutenberg_product( $can_edit, $post_type ) {

		if ( $post_type == 'product' ) {
			$can_edit = true;
		}
		return $can_edit;
	}
	add_filter( 'use_block_editor_for_post_type', 'activate_gutenberg_product', 10, 2 );


  // Mini woocommerce cart
  function emp_mini_cart() {
    echo '<div class="widget woocommerce widget_shopping_cart my-3 asd"><ul class="">';
    echo '<li> <div class="widget_shopping_cart_content fadeIn">';
    woocommerce_mini_cart();
    echo '</div></li></ul></div>';
  }
  add_shortcode( 'emp-mini-cart', 'emp_mini_cart' );


  function wc_refresh_mini_cart_count($fragments){
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    $fragments['#mini-cart-count'] = '<div id="mini-cart-count" class="emp-mini-cart-count">' . $count . '</div>';
    $fragments['#mini-cart-count-footer'] = '<div id="mini-cart-count-footer" class="emp-mini-cart-count icon-color">' . $count . '</div>';
    return $fragments;
  }
  add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');

  // Circular add to cart button with plus icon for loop
  function emp_loop_add_to_cart_button( $html, $product, $args ) {
    $icon = '<i class="fa fa-plus"></i>';
    return sprintf(
      '<a href="%s" data-quantity="%s" class="%s emp-loop-btn-circle" %s title="%s" aria-label="%s">%s</a>',
      esc_url( $product->add_to_cart_url() ),
      esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
      esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
      isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
      esc_attr( $product->add_to_cart_text() ),
      esc_attr( $product->add_to_cart_text() ),
      $icon
    );
  }
  add_filter( 'woocommerce_loop_add_to_cart_link', 'emp_loop_add_to_cart_button', 10, 3 );

  // Toggle sale badge based on Customizer setting
  add_filter( 'woocommerce_sale_flash', function( $html ) {
    if ( ! get_theme_mod( 'emp_woocommerce_show_sale_badge', true ) ) {
      return '';
    }
    return $html;
  } );
}

// Add custom field on woocommerce page
// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields1');
// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
function woocommerce_product_custom_fields1(){
    global $woocommerce, $post;

    wp_nonce_field( 'emp_save_product_custom_fields', 'emp_product_custom_fields_nonce' );

    echo '<div class="product_custom_field">';
    echo '<p class="form-field _custom_product_component_field_mother_field ">
			<label class="product_custom_field"><b>PC Gamer</b></label>
		</p>';

    // Custom Product Text Fields
    woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_cpu',
        'placeholder' => 'Modelo de CPU',
        'label' => __('Procesador', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_mother',
        'placeholder' => 'Modelo de placa base',
        'label' => __('Mother', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_ram',
        'placeholder' => 'Cantidad de RAM',
        'label' => __('RAM', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_gpu',
        'placeholder' => 'Modelo Gráfica',
        'label' => __('Gráfica', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_select( 
		array( 
			'id'      => '_custom_product_component_field_gpu_brand', 
			'label'   => __( 'Marca Gráfica', 'woocommerce' ),
			'options' =>  array('', 'Nvidia', 'AMD')
		)
	);
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_ssd_hdd',
        'placeholder' => 'Cantidad de almacenamiento y tipo',
        'label' => __('Almacenamiento', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_power_supply',
        'placeholder' => 'Cantidad de Watts y certificación',
        'label' => __('Fuente', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_chassis',
        'placeholder' => 'Modelo de Gabinete o carácterísticas',
        'label' => __('Gabinete', 'woocommerce'),
        'desc_tip' => 'true'
    ));
	woocommerce_wp_text_input(array(
        'id' => '_custom_product_component_field_display',
        'placeholder' => 'Especificaciones generales',
        'label' => __('Monitor', 'woocommerce'),
        'desc_tip' => 'true'
    ));

	// Benchmark
	echo '<br><p class="form-field _custom_product_component_field_mother_field ">
			<label class="product_custom_field"><b>Benchmark</b></label>
		</p>';
	
	for ( $i = 1; $i <= 5; $i++ ) {
		woocommerce_wp_text_input(array(
			'id'          => '_custom_benchmark_quality_' . $i,
			'placeholder' => 'Juego / Calidad y resolución (ej: Cyberpunk 1080p Ultra)',
			'label'       => sprintf( __( 'Juego %d', 'empralidad' ), $i ),
			'desc_tip'    => 'true'
		));
		woocommerce_wp_text_input(array(
			'id'          => '_custom_benchmark_fps_' . $i,
			'placeholder' => 'Solo el número (ej: 60)',
			'label'       => __( 'FPS', 'woocommerce' ),
			'desc_tip'    => 'true'
		));
		echo '<br>';
	}

    echo '</div>';
}
function woocommerce_product_custom_fields_save($post_id){
    // Nonce verification
    if ( ! isset( $_POST['emp_product_custom_fields_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['emp_product_custom_fields_nonce'] ) ), 'emp_save_product_custom_fields' ) ) {
        return;
    }

    // Check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Custom Product Component Text Fields
    $component_fields = array(
        '_custom_product_component_field_cpu',
        '_custom_product_component_field_mother',
        '_custom_product_component_field_ram',
        '_custom_product_component_field_gpu',
        '_custom_product_component_field_gpu_brand',
        '_custom_product_component_field_ssd_hdd',
        '_custom_product_component_field_power_supply',
        '_custom_product_component_field_chassis',
        '_custom_product_component_field_display',
    );

    foreach ( $component_fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
            if ( $value !== '' ) {
                update_post_meta( $post_id, $field, $value );
            } else {
                delete_post_meta( $post_id, $field );
            }
        }
    }

    // Custom Benchmark Fields (1 to 5)
    for ( $i = 1; $i <= 5; $i++ ) {
        $quality_key = '_custom_benchmark_quality_' . $i;
        $fps_key     = '_custom_benchmark_fps_' . $i;

        if ( isset( $_POST[ $quality_key ] ) ) {
            $quality_val = sanitize_text_field( wp_unslash( $_POST[ $quality_key ] ) );
            if ( $quality_val !== '' ) {
                update_post_meta( $post_id, $quality_key, $quality_val );
            } else {
                delete_post_meta( $post_id, $quality_key );
            }
        }

        if ( isset( $_POST[ $fps_key ] ) ) {
            $fps_val = sanitize_text_field( wp_unslash( $_POST[ $fps_key ] ) );
            if ( $fps_val !== '' ) {
                update_post_meta( $post_id, $fps_key, $fps_val );
            } else {
                delete_post_meta( $post_id, $fps_key );
            }
        }
    }
}

//  12) GitHub Updates
function emp_check_update( $transient ) {
  if ( empty( $transient->checked ) ) {
    return $transient;
  }
  $theme_data = wp_get_theme(wp_get_theme()->template);
  $theme_slug = $theme_data->get_template();
  //Delete '-master' from the end of slug
  $theme_uri_slug = preg_replace('/-master$/', '', $theme_slug);

  $remote_version = '0.0.0';
  $style_css = wp_remote_get("https://raw.githubusercontent.com/alanpereyra57/".$theme_uri_slug."/master/style.css")['body'];
  if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] )
    $remote_version = _cleanup_header_comment( $match[1] );

  if (version_compare($theme_data->version, $remote_version, '<')) {
    $transient->response[$theme_slug] = array(
        'theme'       => $theme_slug,
        'new_version' => $remote_version,
        'url'         => 'https://github.com/alanpereyra57/'.$theme_uri_slug,
        'package'     => 'https://github.com/alanpereyra57/'.$theme_uri_slug.'/archive/master.zip',
    );
  }
  return $transient;
}

add_filter( 'pre_set_site_transient_update_themes', 'emp_check_update' );


// 13) Fix bugs

// admin bar
if ( ! current_user_can( 'manage_options' ) ) {
  show_admin_bar( false );
}

add_action( 'emp_max_min_price', 'get_max_and_min_price' );
function get_max_and_min_price() {
	global $wpdb;
	$sql = "SELECT MIN(CAST(meta_value AS DECIMAL(10,2))) as min_price, MAX(CAST(meta_value AS DECIMAL(10,2))) as max_price 
          FROM {$wpdb->postmeta} pm
          INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
          WHERE pm.meta_key = '_price' AND pm.meta_value > '' AND p.post_status = 'publish' AND p.post_type = 'product'";

	$result = $wpdb->get_row( $sql );
	return $result ? array(
    'min' => (float) $result->min_price,
    'max' => (float) $result->max_price
  ) : array( 'min' => 0, 'max' => 0 );
}

// Emogi on database
add_filter( 'wp_insert_post_data', function( $data, $postarr ) {
	if ( ! empty( $data['post_content'] ) ) {
		$data['post_content'] = wp_encode_emoji( $data['post_content'] );
	}
	return $data;
	}, 99, 2 );

// Variable product price range: show only min price with "Desde" prefix
add_filter( 'woocommerce_variable_price_html', 'emp_variable_product_price_from', 10, 2 );
function emp_variable_product_price_from( $price, $product ) {
	if ( ! $product || ! $product->is_type( 'variable' ) ) {
		return $price;
	}

	$prices = $product->get_variation_prices( true );
	if ( empty( $prices['price'] ) ) {
		return $price;
	}

	$min_price = current( $prices['price'] );
	$max_price = end( $prices['price'] );

	if ( $min_price !== $max_price ) {
		$price = sprintf(
			'<span class="emp-price-range-from"><span class="emp-price-from">%s</span> %s</span>',
			esc_html__( 'Desde', 'empralidad' ),
			wc_price( $min_price )
		);
		$price .= $product->get_price_suffix();
	}

	return $price;
}
?>
