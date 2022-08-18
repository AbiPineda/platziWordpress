<?php get_header(); ?>

<!-- Loop basico que corresponde a pagina principal -->
<main class="container">
    <?php  
        if(have_posts()){
          while(have_posts()){
            the_post();?>
    <h1 class="my-3"> <?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php }  
        }
    ?>

    <div class="lista-productos my-5 ">
        <h2 class="text-center">Productos</h2>
        <div class="row">
            <div class="col-12">
                <select class="form-control" name="categorias-productos" id="categorias-productos">
                    <option value="">Todas las categorías</option>
                    <!--  categoria-productos -> Slug de la taxonomia 
                    en el array devolvemos solo los terminos que tengan productos asociados.
                    -->
                    <?php $terms = get_terms('categoria-productos', array('hide_empty' => true)); ?>
                    <?php foreach ($terms as $term){ ?>
                    <option value="<?php echo $term->slug  ?>">
                        <?php echo $term->name ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div id="resultados-productos" class="row justify-content-center">
            <?php
            $args = array(
                'post_type' => 'producto',
                /* define la cantidad de productos a traer: */
                'post_per_page'=> -1,
                /* Orden en que se mostrara el contenido */
                'order' => 'DESC',
                'orderby'=> 'title'
            );
            $productos = new WP_Query($args);

            if($productos -> have_posts()){
                while($productos->have_posts()){
                    $productos->the_post();
                    ?>
            <div class="col-md-4 col-12 my-3 text-center">
                <figure class="card-img-top">
                    <?php 
                            the_post_thumbnail('large');
                            ?>
                </figure>
                <h4 class="my-3 text-center">
                    <a class="btn btn-outline-primary" href="<?php the_permalink(); ?>">
                        ver <?php the_title(); ?>
                    </a>
                </h4>

            </div>
            <?php 
            }
            }
            ?>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <h2>Últimas Novedades</h2>
            </div>
        </div>
        <div id="resultado-novedades" class="row">

        </div>
    </div>
</main>

<?php get_footer(); ?>