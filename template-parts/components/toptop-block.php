<div class="toptop flex items-center flex-nowrap md:flex-wrap overflow-x-scroll md:overflow-x-auto -mx-2">
  <?php 
    $top_top_posts = new WP_Query( array( 
      'post_type' => 'post', 
      'posts_per_page' => 4,
      'meta_query' => array(
        array(
          'key' => '_crb_post_top',
          'value' => 'yes',
          'compare' => '='
        ),
      ),
    ) );
    if ($top_top_posts->have_posts()) : while ($top_top_posts->have_posts()) : $top_top_posts->the_post(); 
  ?>
    <div class="w-full min-w-[180px] lg:min-w-auto lg:w-1/4 px-2">
      <div class="relative">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div>
          <?php 
            $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
          ?>
          <img 
          class="w-full h-[250px] object-cover rounded-lg" 
          alt="<?php the_title(); ?>" 
          src="<?php echo $medium_thumb; ?>" 
          srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
          loading="lazy" 
          data-src="<?php echo $medium_thumb; ?>" 
          data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-transparent to-black rounded-lg"></div>
        <div class="absolute bottom-4 left-4 right-4 text-sm font-semibold text-white"><?php the_title(); ?></div>
      </div>
    </div>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</div>