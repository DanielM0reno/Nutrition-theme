<?php
/*
Template Name: Página sobre mí
*/
?>

<?php get_header();?>

    <!-- MAIN -->
    <main id="main_about">
        <div class="bg-light content-template pt-5 border border-2 rounded">
            <div class="container">
                <?php while ( have_posts() ):the_post();the_content();?>
                
                <?php get_template_part( 'content', 'page' ); ?>
                <?php endwhile; // end of the loop. ?>
            </div>
        </div>
    </main>
    <!-- /MAIN -->

  <?php get_footer();?>