<?php get_header(); ?>
    <div>       
        <main>
            <section class="slider">
                <div class="container">
                    <div class="row">Slider</div>
                </div>
            </section>
            <section class="popular-products">
                <div class="container">
                    <div class="row">Popular Products</div>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row">New Arrivals</div>
                </div>
            </section>
            <section class="deal-of-the-week">
                <div class="container">
                    <div class="row">Deal of the Week</div>
                </div>
            </section>            
            <section class="lad-blog">
                <div class="container">
                    <div class="row">
                        <?php 
                            if (have_posts(  )) : 
                                while (have_posts(  )) : the_post(  );
                               endwhile;
                            else:
                          ?>
                            <p>Nothing to display</p>
                          <?php 
                            endif
                          ?>
                    </div>
                </div>
            </section>         
        </main>-
    </div>
<?php get_footer(); ?>
   