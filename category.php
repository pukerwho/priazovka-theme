<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <h1 class="text-2xl xl:text-3xl font-medium mb-6"><?php the_archive_title(); ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="border dark:border-gray-500 shadow-lg rounded-lg mb-6">
          <?php echo get_template_part('template-parts/post-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      <div class="flex justify-between items-center prose-a:inline-block prose-a:bg-indigo-500 prose-a:text-gray-200 prose-a:rounded prose-a:px-6 prose-a:py-3">
        <?php posts_nav_link(); ?>	
      </div>
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