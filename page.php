<?php get_header(); ?>

<div class="container py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="text-2xl xl:text-3xl font-medium mb-6"><?php the_title(); ?></h1>
        <div class="content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="w-full xl:w-2/12 xl:px-3">
      <div>
        <?php echo get_template_part('template-parts/components/allcity-block'); ?>
        <?php echo get_template_part('template-parts/components/allhotels-block'); ?>
      </div>
    </div>
  </div>
  
</div>

<?php get_footer(); ?>