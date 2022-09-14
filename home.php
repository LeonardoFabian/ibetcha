<?php
/**
 * Blog page
 */
?>

<?php get_header(); ?>

    <?php    
    $blog_page = get_option('page_for_posts');
    $image_id = get_post_thumbnail_id($blog_page->object_id);
    $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
    // var_dump( $image_src );    
    ?>

    <div class="hero" style="background-image: url(<?php echo $image_src; ?>);">
        <div class="hero-content">
            <h1><?php echo get_the_title( $blog_page ); ?></h1>
        </div>
    </div>

    <div class="section container-fluid">

        <div class="row col-12">

            <!-- page-navigation -->
        <aside class="sidebar col-12 col-md-3">
            <?php
                $args = array(
                    'theme_location' => 'sidebar-menu',
                    'container' => 'nav',
                    'container_class' => 'ibetcha-sidebar-menu',
                    'container_id' => 'ibetcha-sidebar-menu'
                );
                wp_nav_menu( $args );
            ?>
        </aside>

        <main class="main-content col-12 col-md-6">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php 
                    $post = get_post();
                    $categories = get_the_category( $post->ID );
                ?>
                <article class="ibetcha-post">

                    <?php foreach( $categories as $category ) { ?>
                        <?php 
                        $category_link = get_category_link( $category->term_id );
                        ?>
                        <div class="ibetcha-post-category">
                            <a href="<?php echo $category_link; ?>">
                                <h2><?php echo $category->name; ?></h2>
                            </a>                            
                        </div>
                    <?php } ?>

                    <div class="ibetcha-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="ibetcha-article-image-wrapper">
                                <div class="ibetcha-article-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post, 'background') ?>);">
                                </div>
                            </div>
                        </a>
                        
                        <div class="ibetcha-card-content">
                            <div class="ibetcha-card-body">
                                                                    
                                    <?php if ( is_home() ) : ?>    
                                        <?php get_template_part( 'template-parts/post', 'header' ); ?>
                                    <?php endif; ?>
                                </header>     
                                <!-- mobile excerpt -->
                                <section class="ibetcha-post-content ibetcha-mobile-only">
                                    <?php if ( ! has_excerpt() ) { ?>
                                        <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                                    <?php } else { ?>
                                        <?php the_excerpt(); ?>
                                    <?php } ?>
                                </section>
                            </div> 
                        </div>              
                    </div>
                </article>               
            <?php endwhile; ?>

            <div class="ibetcha-post-pagination">
                <?php previous_posts_link( esc_html( 'Previous', 'ibetcha' ) ); ?>
                <?php next_posts_link( esc_html( 'Next', 'ibetcha' ) ); ?>

                <!-- <?php echo paginate_links(); ?> -->
            </div>
        </main>

        <div class="col-12 col-md-3">
            <?php get_sidebar(); ?>
        </div>


        </div>

    </div>
    

<?php get_footer(); ?>