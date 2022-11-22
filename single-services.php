<?php get_header(); ?>
<div class="container">
  <div class="row">
  <?php /* The loop */ ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="main-post-div">
        <div class="single-page-post-heading">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="content-here">
          <?php  the_content();  ?>
        </div>               
    </div>
<?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>