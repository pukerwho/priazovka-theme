<div class="h-full relative bg-gradient-to-r from-main-gray to-main-dark border-2 border-main-gray hover:text-white rounded-xl">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="h-[185px] xl:h-[250px] min-h-[185px] xl:min-h-[250px] mb-4">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-full rounded-t-xl object-cover">
  </div>
  <div class="px-4 xl:px-6 py-2 xl:py-4">
    <div class="text-xl mb-4 xl:mb-6">
      <?php the_title(); ?>
    </div>
    <div class="opacity-75 text-sm mb-6">
      <?php $content_text = wp_strip_all_tags( get_the_content() );
      echo mb_strimwidth($content_text, 0, 130, '...'); ?>
    </div>
    <div class="text-primary uppercase"><?php _e("Детальніше", "treba-wp"); ?></div>
  </div>
  
</div>