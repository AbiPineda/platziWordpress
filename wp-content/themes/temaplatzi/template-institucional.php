<?php 
//Template Name: Página Institucional
get_header(); 
$fields = get_fields();
?>

<main class="container my-5">
    <h1 class="my-3"><?php echo $fields['titulo']?></h1>
    <?php if (have_posts()) {
        while(have_posts(  )){
            the_post(); ?>
    <div class="row">
        <div class="col-3">
            <img style="width:100%" src="<?php echo $fields['imagen'] ?>" />
        </div>
        <div class="col-9" style="text-align: justify;">
            <?php the_content(); ?>
        </div>
    </div>
    <hr>
    <?php }
    } ?>
</main>

<?php get_footer(); ?>