<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="hero-content">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<div class="section container">
    <main class="main-content">    

        <?php if ( is_single() ) : ?>  
            <?php get_template_part( 'template-parts/post', 'header' ); ?>                
        <?php endif; ?>

        <?php the_content(); ?>
        
    </main>
</div>   