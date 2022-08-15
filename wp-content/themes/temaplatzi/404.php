<?php get_header() ?>

<main class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-1" style="text-align: center;">
                <img src="<?php echo get_template_directory_uri()?>/assets/img/404.jpg" alt="error"
                    style="width: 55%;">
                <a class="btn btn-outline-primary" href="<?php echo home_url(); ?>">Regresar a página principal</a>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>