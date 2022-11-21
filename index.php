<?php get_header(); ?>
    <div>       
        <main>         
                <div class="container">
                    <div class="row">
                        <?php 
                            if (have_posts(  )) : 
                                while (have_posts(  )) : the_post(  );
                                ?>
                                <article>
                                    <h2><?php the_title(); ?></h2>
                                    <div><?php the_content(); ?></div>
                                </article>
                                <?php
                               endwhile;
                            else:
                          ?>
                            <p>Nothing to display</p>
                          <?php 
                            endif
                          ?>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                    <?php
                    global $post;

                    $myposts = get_posts([ 
                      'numberposts' => -1,
                      'category_name' => 'blog'
                      // 'offset'      => 2,
                      // 'category'    => 4
                    ]);

                    if( $myposts ){
                      foreach( $myposts as $post ){
                        setup_postdata( $post );
                        ?>
                    
                       <div class="services__content-box">
                             <h6 class="services__content-title">
                             <?php the_title(); ?>
                              </h6>
            <div class="services__content-textbox">
              <p class="services__content-text">
              <?php the_content(); ?>
            </div>
          </div> 
                        <?php 
                      }
                    } else {
                      // Постов не найдено
                    }

                    wp_reset_postdata(); // Сбрасываем $post
                    ?>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                    <?php 
                        $args = array( 'post_type' => 'movies', 'posts_per_page' => 10 );
                        $the_query = new WP_Query( $args ); 
                        ?>
                        <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <div class="entry-content">
                        <?php the_content(); ?> 
                        </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                        <?php else:  ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                    <?php   $args = array( 'post_type' => 'services', 'posts_per_page' => 20 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="services-items">
            <?php the_title(); 
       
        echo '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( $post->post_title ) . '">';
        echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
        echo '</a>'; 

?>
<div class="entry-content">
                        <?php the_content(); ?> 
                        </div>
            </div>
    <?php endwhile; ?>
                    </div>
                </div>
        </main>
    </div>
<?php get_footer(); ?>
   