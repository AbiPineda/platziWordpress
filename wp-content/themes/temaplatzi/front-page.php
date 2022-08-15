<?php get_header(); ?>

<!-- Loop basico que corresponde a pagina principal -->
<main class="container">
    <?php  
        if(have_posts()){
          while(have_posts()){
            the_post();?>
    <h1 class="my-3"> <?php the_title(); ?>!!</h1>
    <?php the_content(); ?>
    <?php }  
        }
    ?>
    <div class="lista-productos">
        <h2 class="text-center">Productos</h2>
        <div class="row">

            <?php
        $args = array(
            'post_type' => 'producto',
            /* define la cantidad de productos a traer: */
            'post_per_page'=> -1,
        );
        $productos = new WP_Query($args);

        if($productos -> have_posts()){
            while($productos->have_posts()){
                $productos->the_post();
                ?>
                <div class="col-4">
                    <figure>
                        <?php 
                        the_post_thumbnail('large');
                        ?>
                    </figure>
                    <h4>
                        <a href="<?php the_permalink() ?>"></a>
                    </h4>
                </div>
            <?php 
           }
        }
        ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>