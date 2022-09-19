<div class="relative bg-main-gray rounded-2xl h-full">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="h-[200px] xl:h-[250px]">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-full object-cover rounded-t-2xl ">
  </div>
  <div class="flex flex-col items-between px-4 py-6">
    <div class="text-lg xl:text-xl font-title mb-4 xl:mb-6"><?php the_title(); ?></div>
    <div class="text-sm xl:text-base opacity-75">
      <?php $content_text = wp_strip_all_tags( get_the_content() );
      echo mb_strimwidth($content_text, 0, 130, '...'); ?>
    </div>
  </div>
</div>