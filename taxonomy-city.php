<?php 
$current_cat_id = get_queried_object_id();
$taxonomyName = "city";
$term = get_term_by('slug', get_query_var('term'), $taxonomyName);

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

?>

<?php get_header(); ?>

<div class="container py-6 xl:py-10">
  <div class="flex flex-wrap xl:-mx-3">
    <div class="w-full xl:w-2/12 xl:px-3">
      <!-- all categories -->
      <div class="hidden xl:block">
        <?php echo get_template_part('template-parts/components/allcategories-block'); ?>
        <?php echo get_template_part('template-parts/components/quiz-block'); ?>
      </div>
      <!-- end all categories -->
    </div>
    <div class="w-full xl:w-8/12 xl:px-3 mb-6 xl:mb-0">
      <div class="text-2xl xl:text-3xl mb-4">
        <?php if (carbon_get_term_meta($current_cat_id, 'crb_category_heading')): ?>
          <?php echo carbon_get_term_meta($current_cat_id, 'crb_category_heading'); ?>
        <?php else: ?>
          <?php if((int)$term->parent): ?>
            <?php $parent_term = get_term_by( 'id', $term->parent, 'city' ); ?>
            <?php echo $parent_term->name; ?>: <?php single_term_title(); ?>
          <?php else: ?>
            <?php single_term_title(); ?>: <?php _e("снять жилье", "treba-wp"); ?>
          <?php endif; ?>
        <?php endif; ?>
        
      </div>
      <div class="text-lg italic opacity-75 mb-2"><?php _e("Категории", "treba-wp"); ?>:</div>
      <div class="flex items-center flex-wrap gap-x-4 mb-4">
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
      <table class="w-full border dark:border-gray-500 bg-gray-100 dark:bg-neutral-800 table-auto mb-6">
        <tbody>
          <tr class="border-b border-gray-300 dark:border-gray-500">
            <td class="font-semibold whitespace-nowrap px-2 py-3">🏠 <?php _e("Количество предложений", "treba-wp"); ?></td>
            <td class="whitespace-nowrap px-2 py-3"><?php echo $query->post_count; ?></td>
          </tr>
          <tr class="border-b border-gray-300 dark:border-gray-500">
            <td class="font-semibold whitespace-nowrap px-2 py-3">🏦 <?php _e("Самый дорогой вариант", "treba-wp"); ?></td>
            <td class="whitespace-nowrap px-2 py-3">
              <?php echo get_city_max_price($query); ?>00 
              грн.
            </td>
          </tr>
          <tr class="border-b border-gray-300 dark:border-gray-500">
            <td class="font-semibold whitespace-nowrap px-2 py-3">💸 <?php _e("Самый дешевый вариант", "treba-wp"); ?></td>
            <td class="whitespace-nowrap px-2 py-3">
              <?php echo get_city_min_price($query); ?>00
              грн.
            </td>
          </tr>
          <tr class="border-b border-gray-300 dark:border-gray-500">
            <td class="font-semibold whitespace-nowrap px-2 py-3">🕒 <?php _e("Информация обновлена", "treba-wp"); ?></td>
            <td class="whitespace-nowrap px-2 py-3"><?php echo date('d.m.Y',strtotime("-1 days")); ?></td>
          </tr>
        </tbody>
      </table>
      <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <div class="mb-6">
        <?php get_template_part('template-parts/hotel-item'); ?>
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>

      <div class="b_pagination text-center mb-12">
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

      <div class="content">
        <?php 
        $seoText = carbon_get_term_meta($current_cat_id, 'crb_city_seo_text');
        if ($seoText && $current_page < 2): ?>
          <div class="content-city mb-6">
            <?php echo apply_filters( 'the_content', $seoText  ); ?>
          </div>
        <?php endif; ?>
        <h2>
          <?php _e("Дополнительная информация", "treba-wp"); ?>
        </h2>
        <table class="w-full table-auto">
          <tbody>
            <tr class="border-b border-gray-300">
              <td class="font-semibold whitespace-nowrap px-2 py-3">👨‍👩‍👦 <?php _e("Население", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3"><?php echo carbon_get_term_meta($current_cat_id, 'crb_category_count_people'); ?></td>
            </tr>
            <tr class="border-b border-gray-300">
              <td class="font-semibold whitespace-nowrap px-2 py-3">📍 <?php _e("Область", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3"><?php echo carbon_get_term_meta($current_cat_id, 'crb_category_oblast'); ?></td>
            </tr>
            <tr class="border-b border-gray-300">
              <td class="font-semibold whitespace-nowrap px-2 py-3">⭐ <?php _e("Рейтинг", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3">4.<?php echo get_city_rating($current_cat_id); ?></td>
            </tr>
          </tbody>
        </table>
        <h2>FAQ</h2>
        <div itemscope itemtype="https://schema.org/FAQPage">
          <?php $hotels = $query->posts; ?>
          <dl itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-4">
            <dt itemprop="name"><h3>❯ <?php _e("Порекомендуйте, где лучше всего снять жилье?", "treba-wp"); ?></h3></dt>
            <dd itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><span itemprop="text">🏘️ 
              <?php _e("Предлагаем обратить внимание на эти варианты", "treba-wp"); ?>:
              <?php if ($hotels[1]->ID): ?>
              <a href="<?php echo get_the_permalink($hotels[1]->ID); ?>"><?php echo $hotels[1]->post_title; ?></a>,
              <?php endif; ?>
              <a href="<?php echo get_the_permalink($hotels[0]->ID); ?>"><?php echo $hotels[0]->post_title; ?></a>
            </span></dd>
          </dl>
          <dl itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-4">
            <dt itemprop="name"><h3>❯ <?php _e("Сколько стоит снять жилье?", "treba-wp"); ?></h3></dt>
            <dd itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><span itemprop="text">💰 <?php _e("Цены могут меняться, в зависимости от сезона. На данный момент минимальная цена", "treba-wp"); ?> - <?php echo get_city_min_price($query); ?>00 грн., <?php _e("а максимальная", "treba-wp"); ?> - <?php echo get_city_max_price($query); ?>00 грн.</span></dd>
          </dl>
          <dl itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-4">
            <dt itemprop="name"><h3>❯ <?php _e("Какое жилье сейчас пользуется спросом?", "treba-wp"); ?></h3></dt>
            <dd itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <span itemprop="text">🏡 <?php _e("Популярные варианты", "treba-wp"); ?>:
                <?php foreach (array_slice($hotels, 0,3) as $hotel): ?>
                <a href="<?php echo get_the_permalink($hotel->ID); ?>"><?php echo $hotel->post_title; ?>;</a>
                <?php endforeach; ?>
              </span>
            </dd>
          </dl>
          <dl itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-4">
            <dt itemprop="name"><h3>❯ <?php _e("Интересует недорогое жилье - можете порекомендовать?", "treba-wp"); ?></h3></dt>
            <dd itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <span itemprop="text">🛏️ <?php _e("Можем порекомендовать следующие варианты", "treba-wp"); ?>: 
              <?php 
                shuffle($hotels);
                foreach (array_slice($hotels, 0,3) as $hotel): ?>
                <a href="<?php echo get_the_permalink($hotel->ID); ?>"><?php echo $hotel->post_title; ?>;</a>
              <?php endforeach; ?>
              </span>
            </dd>
          </dl>
        </div>
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