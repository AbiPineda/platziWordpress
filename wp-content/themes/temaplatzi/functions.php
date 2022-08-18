<?php
function init_template(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    /* Lugar donde el administrador insertara el menu */
    register_nav_menus( array('top_menu'=> 'Menú Principal') );
}

add_action('after_setup_theme','init_template');

/* Librerias */
function assets(){
wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
', '', '5.2.0', 'all');

wp_register_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', '', '1.0', 'all' );

/* Estilos */
wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');

/* Javascript */
wp_enqueue_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js
',array('jquery'),'5.2.0',true);

/* mis propios scripts */
 wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','','1.0',true);

 /* API */
 wp_localize_script( 'custom', 'pg', array(
    // 'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'apiurl'  => home_url('wp-json/pg/v1/')
));
}

/* Hooks que se ejecutara cuando inicialice/renderize la pagina */
add_action('wp_enqueue_scripts','assets');

function sidebar(){
    register_sidebar(
            array(
                'name' => 'Pie de pagina',
                'id' => 'footer',
                'description' => 'Zona de Widgets para pie de pagina',
                'before_title' => '<p>',
                'after_title' => '</p>',
                'before_widget' => '<div id="%1$s" class= "%2$s">',
                'after_widget'  => '</div>',
            )    
        );
}
add_action('widgets_init', 'sidebar');

/* Opcion de agregar productos */
function productos_type(){
    $labels = array(
        'names' => 'Productos',
        'singular_name' => 'Producto',
        'menu_name' => 'Productos',
    );
    $args = array(
        'label' =>'Productos', 
        'description' => 'Productos de Platzi',
        'labels' => $labels,
        'supports' => array('title','editor','thumbnail','revisions'),
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart', /* icono */
        'can_export' => true, /* se pueda exportar contenido */
        'publicly_queryable' => true,
        'rewrite' => true,
        'show_in_rest' => true
    );
    /* Se recomiendan nombres en singular */
    register_post_type('producto', $args);
}
add_action('init','productos_type');

add_action('init','pgRegisterTax');

function pgRegisterTax(){
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Categorías de Productos',
            'singular_name' => 'Categoría de Productos'
        ),
        'show_in_nav_menu' => true,
        'show_admin_column'=> true,
        'rewrite' => array('slug' => 'categoria-productos')
    );
    register_taxonomy('categoria-productos',array('producto'),$args);
}

add_action("wp_ajax_nopriv_pgFiltroProductos", "pgFiltroProductos");
add_action("wp_ajax_pgFiltroProductos", "pgFiltroProductos");

function pgFiltroProductos() {
    $args = array(
        'post_type' => 'producto',
        'posts_per_page' => -1,
        'order'     => 'ASC',
        'orderby' => 'title',
    );

    if ($_POST['categoria']) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria-productos',
                'field' => 'slug',
                'terms' => $_POST['categoria']
            )
        );
    }

    $productos = new WP_Query($args);

    $return = array();
    if ($productos->have_posts( )) {
        while ($productos->have_posts()) {
            $productos->the_post();

            $return[] = array(
                'imagen' => get_the_post_thumbnail( get_the_id( ), 'large' ),
                'link'   => get_the_permalink( ),
                'titulo' => get_the_title( )
            );
        }
    }
    wp_send_json( $return );
}
/* Endpoints */
add_action( 'rest_api_init', 'novedadesAPI' );

function novedadesAPI() {
    register_rest_route( 
        'pg/v1',
        '/novedades/(?<cantidad>\d+)',
        [ 
            'methods' => 'GET',
            'callback' => 'pedidoNovedades'
        ]
    );
}

function pedidoNovedades($data) {
    $args = array(
        'post_type' => 'producto',
        'posts_per_page' => $data['cantidad'],
        'order'     => 'ASC',
        'orderby' => 'title',
    );

    $novedades = new WP_Query($args);

    if ($novedades->have_posts( )) {
        while ($novedades->have_posts()) {
            $novedades->the_post();

            $return[] = array(
                'imagen' => get_the_post_thumbnail( get_the_id( ), 'large' ),
                'link'   => get_the_permalink( ),
                'titulo' => get_the_title( )
            );
        }
        return $return;
    }
}