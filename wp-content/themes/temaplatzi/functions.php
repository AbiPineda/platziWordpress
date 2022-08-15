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