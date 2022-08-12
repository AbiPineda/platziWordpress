<!-- Lista nueva que encabezara wordpress -->

<?php get_header(); ?>

<!-- traer el contenido de nuestra pagina -->

<main class="container">
    <!-- Genera el loop -->
    <?php if (have_posts()) {
        /* <!-- evalua si hay contenido o no --> */
        while(have_posts(  )){
            the_post(); ?>
            <!-- retorna el titulo de la pagina y lo imprime -->
            <h1 class="my-3"><?php the_title(); ?></h1>

            <!-- muestra el contenido -->
            <?php the_content(); ?>

        <?php }
    }?>
</main>

<?php get_footer(); ?>