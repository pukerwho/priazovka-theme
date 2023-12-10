<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block sticky top-4">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php 
          $currentId = get_the_ID();
          $countNumber = tutCount($currentId);
        ?>
        <div class="xl:border xl:dark:border-gray-500 xl:shadow-lg xl:rounded-lg xl:p-5" itemscope itemtype="http://schema.org/Article">

          <article class="mb-8">

            <div class="relative mb-6">
              <h1 class="absolute bottom-0 text-xl xl:text-3xl text-white font-medium z-1 p-5 xl:p-10" itemprop="headline"><?php the_title(); ?></h1>  
              <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-transparent to-black/80 rounded-lg"></div>
              <?php if (get_the_post_thumbnail_url()): ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-80 xl:h-full object-cover rounded-lg" itemprop="image">
              <?php else: ?>
                <div class="w-full min-h-[200px] bg-gray-700 rounded-lg"></div>
              <?php endif; ?>
            </div>

            <!-- meta -->
            <div class="border dark:border-gray-500 shadow-lg rounded-lg px-6 py-4 mb-8">
              <div class="mb-2">
                <div>
                  <span class="font-medium"><?php _e("Автор", "treba-wp"); ?></span>: 
                  <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
                    <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
                    <div class="flex items-center text-sm">
                      <!-- instagram -->
                      <?php if (carbon_get_the_post_meta('crb_post_author_instagram')): ?>
                        <div class="italic pb-2 pr-3"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_instagram'); ?>" class="text-indigo-500">Instagram</a></div>
                      <?php endif; ?>
                      <!-- facebook --> 
                      <?php if (carbon_get_the_post_meta('crb_post_author_facebook')): ?>
                        <div class="italic pb-2"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_facebook'); ?>" class="text-indigo-500">Facebook</a></div>
                      <?php endif; ?>
                    </div>

                  <?php else: ?>
                    <?php echo get_the_author(); ?>
                  <?php endif; ?>
                </div>
                <?php if (carbon_get_the_post_meta('crb_post_editor')): ?>
                  <div><span class="font-medium"><?php _e("Редактор", "treba-wp"); ?></span>: <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_editor'); ?></span></div>
                <?php endif; ?>
              </div>
              <div class="flex flex-wrap -mx-2">
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                  </div>
                  <div><?php echo get_the_modified_time('d.m.Y') ?>;</div>
                </div>
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </div>
                  <div><?php echo $countNumber; ?>;</div>
                </div>
              </div>
            </div>
            <!-- end meta -->

            <div class="content mb-8" itemprop="articleBody">
              <div class="single-subjects mb-5">
                <div class="text-2xl font-bold mb-3">
                  <?php _e('Содержание','treba-wp'); ?>:
                </div>
                <div class="single-subjects-inner"></div>
              </div>
              <?php the_content(); ?>
            </div>

            <!-- Хлебные крошки -->
            <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
              <ul class="flex items-center flex-wrap -mr-4">
                <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
                  <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-200">
                    <span itemprop="name"><?php _e( 'Главная', 'treba-wp' ); ?></span>
                  </a>                        
                  <meta itemprop="position" content="1">
                </li>
                <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
                  <a itemprop="item" href="<?php echo get_page_url('page-blog'); ?>" class="text-indigo-400 dark:text-indigo-200">
                    <span itemprop="name"><?php _e( 'Блог', 'treba-wp' ); ?></span>
                  </a>                        
                  <meta itemprop="position" content="2">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
                  <span itemprop="name"><?php the_title(); ?></span>
                  <meta itemprop="position" content="3" />
                </li>
              </ul>
            </div>
            <!-- END Хлебные крошки -->

          </article>  

          <div class="mb-10">
            <div class="text-2xl mb-6"><span class="border-b-4 border-red-300 font-bold"><?php _e("Комментарии", "treba-wp"); ?></span></div>
            <div class="content">
              <?php comments_template(); ?>
            </div>
          </div> 
          <div class="xl:px-3">
            <h2 class="text-2xl mb-6"><?php _e("ТОП", "treba-wp"); ?></h2>
            <div>
              <?php echo get_template_part('template-parts/components/toptop-block'); ?>
            </div>
          </div>
        </div>  
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="w-full xl:w-2/12 xl:px-3">
      <div>
        <?php echo get_template_part('template-parts/components/similar-posts'); ?>
      </div>
      <div>
        <?php echo get_template_part('template-parts/components/allcity-block'); ?>
      </div>
    </div>
  </div>
  
</div>

<?php get_footer(); ?>
