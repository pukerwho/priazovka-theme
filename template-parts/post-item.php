<div class="relative flex flex-wrap xl:-mx-4">
  <div class="w-full xl:w-1/3 xl:px-4">
    <?php if (get_the_post_thumbnail_url(get_the_ID())): ?>
      <?php 
        $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
      ?>
      <img 
      class="w-full h-full object-cover rounded-t-lg xl:rounded-l-lg" 
      alt="<?php the_title(); ?>" 
      src="<?php echo $medium_thumb; ?>" 
      srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
      loading="lazy" 
      data-src="<?php echo $medium_thumb; ?>" 
      data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
    <?php else: ?>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
      </svg>
    <?php endif; ?>
  </div>
  <div class="w-full xl:w-2/3 xl:px-4">
    <div class="py-5 px-4 xl:px-0 xl:pr-8">
      <!-- categories -->
      <div class="flex items-center mb-2 xl:mb-3">
        <?php
        $post_categories = get_the_terms( $new_posts->ID, 'category' );
        foreach ($post_categories as $post_category){ ?>
          <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="text-sm inline-block bg-blue-100 dark:bg-gray-300 text-black dark:text-gray-600 rounded px-2 py-1 mr-2 mb-2 lg:mb-0"><?php echo carbon_get_term_meta( $post_category->term_id, 'crb_category_emoji' ); ?> <?php echo $post_category->name; ?></a> 
        <?php } ?>
      </div>
      <!-- end categories -->
      <div class="text-xl text-gray-600 dark:text-gray-200 font-bold mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <!-- tags -->
      <?php 
      $posttags = get_the_tags();
      if ($posttags): ?>
        <div class="flex flex-wrap -mx-2 mb-4">
          <?php foreach ($posttags as $tag): ?>
            <div class="text-sm px-2">#<?php echo $tag->name; ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <!-- meta -->
      <div class="flex justify-between items-center text-sm opacity-75">
        <div class="flex items-center">
          <div class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div><?php echo get_the_date('d.m.Y'); ?></div>
        </div>
        <div class="flex items-center">
          <div class="flex items-center mr-4">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
              </svg>
            </div>
            <div>
              <?php echo get_comments_number(); ?>
            </div>
          </div>
          <div class="flex items-center">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div><?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
          </div>
        </div>
      </div>
      <!-- end meta -->
    </div>  
  </div>
  </div>