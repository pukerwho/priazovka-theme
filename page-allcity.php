<?php
/*
Template Name: ВСЕ ГОРОДА
*/
?>
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
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="text-2xl xl:text-3xl font-medium mb-6"><?php the_title(); ?></h1>
        <?php
        $cities = get_terms( array( 
          'taxonomy' => 'city',
          'parent' => 0,
          'orderby' => 'count'
        ) );
        foreach ($cities as $city){ ?>
          <div class="relative bg-gray-200 dark:bg-gray-500 hover:bg-red-200 hover:dark:bg-red-300 hover:dark:text-gray-800 rounded-lg p-3 mb-3">
            <a href="<?php echo get_term_link($city->term_id, 'city') ?>" class="absolute-link"></a>
            <div class="font-medium">➡️ <?php echo $city->name; ?></div>
          </div>
        <?php } ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="w-full xl:w-2/12 xl:px-3">
      <div>
        <?php echo get_template_part('template-parts/components/allhotels-block'); ?>
      </div>
    </div>
  </div>
  
</div>

<?php get_footer(); ?>