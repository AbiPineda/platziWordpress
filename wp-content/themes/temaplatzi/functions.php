<?php
function init_template(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('after_setup_theme','init_template');

/* Librerias */
function assets(){
wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
', '', '5.2.0', 'all');

wp_register_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', '', '1.0', 'all' );

/* Estilos */
wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');

}

/* Hooks que se ejecutara cuando inicialice/renderize la pagina */
add_action('wp_enqueue_scripts','assets');
?>