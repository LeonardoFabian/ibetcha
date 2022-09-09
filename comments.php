<div class="container">
    <div class="ibetcha-post-comments">
        <?php 
            $args = array(
                'class_submit' => 'btn btn-primary'
            );
        
            comment_form( $args ); 
        ?>

        <h3 class="ibetcha-post-comments-title"><?php echo esc_html( 'Comments', 'ibetcha' ); ?></h3>

        <ul class="ibetcha-post-list-comments">
            <?php 
                $args = array(
                    'post_id' => $post->ID,
                    'status' => 'approve'
                );
                $comments = get_comments( $args );

                $args = array(
                    'per_page' => 10,
                    'reverse_top_level' => false
                );
                wp_list_comments( $args, $comments );
            ?>
        </ul>
    </div>
</div>