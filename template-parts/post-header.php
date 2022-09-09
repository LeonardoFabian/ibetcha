<header class="ibetcha-post-header">   
    <?php if ( is_home() ) : ?>
    <a href="<?php the_permalink(); ?>">
        <h2 class="ibetcha-post-title"><?php the_title(); ?></h2>
    </a>    
    <?php endif; ?>
    <div class="ibetcha-post-date">
        <small>
            <time datetime="<?php echo get_the_date( 'c' ); ?>" pubdate><?php echo get_the_date('M. j, Y'); ?></time>    
        </small>
    </div>     
</header>