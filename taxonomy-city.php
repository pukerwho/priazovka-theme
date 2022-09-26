<?php 
$current_cat_id = get_queried_object_id();
$taxonomyName = "city";
$term = get_term_by('slug', get_query_var('term'), $taxonomyName);
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
      <div class="text-2xl xl:text-3xl mb-4">
        <?php if((int)$term->parent): ?>
          <?php $parent_term = get_term_by( 'id', $term->parent, 'city' ); ?>
          <?php echo $parent_term->name; ?>: <?php single_term_title(); ?>
        <?php else: ?>
          <?php single_term_title(); ?>
        <?php endif; ?>
      </div>
      <div class="flex items-center gap-x-4 mb-4">
        <?php if((int)$term->parent) {
          $parent_term = get_term( $term->parent, $taxonomyName );
          $parent_id = $parent_term->term_id; 
        } else {
          $parent_id = get_queried_object_id();
        }
        $child_terms = get_terms($taxonomyName, array('parent' => $parent_id, 'hide_empty' => false ));
        foreach ( $child_terms as $child ): ?>
          <div class="relative bg-blue-100 dark:bg-gray-300 text-black dark:text-gray-600 hover:bg-blue-200 hover:dark:bg-gray-400 hover:dark:text-gray-800 rounded px-6 py-3 mb-2">
            <a href="<?php echo get_term_link( $child ); ?>" class="absolute-link"></a>
            <div>✅ <span class=""><?php echo $child->name ?></span></div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php 
        $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
        $query = new WP_Query( array( 
          'post_type' => 'hotels', 
          'posts_per_page' => 20,
          'order'    => 'DESC',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'city',
              'terms' => $current_cat_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <div class="mb-6">
        <?php get_template_part('template-parts/hotel-item'); ?>
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>

      <div class="b_pagination text-center">
        <?php 
          $big = 9999999991; // уникальное число
          echo paginate_links( array(
            'format' => '?page=%#%',
            'total' => $query->max_num_pages,
            'current' => $current_page,
            'prev_next' => true,
            'next_text' => (''),
            'prev_text' => (''),
          )); 
        ?>
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