<?php get_header(); // template name: Políticas ?>

<main id="content" class="home">
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
            <div class="row">
                <div class="content">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>