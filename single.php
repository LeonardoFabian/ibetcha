<?php get_header(); ?>

<div>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/loop', 'content' ); ?>       

        <!-- Comments -->

        <?php comments_template(); ?>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>