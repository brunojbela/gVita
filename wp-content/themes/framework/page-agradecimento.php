<?php get_header(); // template name: Agradecimento ?>
<main id="agradecimento" class="align-items-center" style="background-image: url(<?php echo get_field('background')['url']; ?>); color: <?php echo get_field('cor_texto'); ?>">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center">
                <?php echo get_field('linha_1'); ?> <br>
                <small><?php echo get_field('linha_2'); ?></small> <br>
                <small><?php echo get_field('linha_3'); ?></small>
            </h1>
        </div>
    </div>
</main>
<?php get_footer(); ?>