<?php
/*
Template Name: Get keywords
*/
?>
<?php get_header(); ?>

<div class="container">
  <table class="min-w-full bg-white rounded-lg">
    <tbody>
      <?php
      $cities = get_terms( array( 
        'taxonomy' => 'city',
        'orderby' => 'count',
      ) );
      foreach ($cities as $city):
      ?>
        <?php   
        $get_term_keywords = carbon_get_term_meta($city->term_id, 'crb_category_keywords');
        if ($get_term_keywords): ?>
          <?php 
          $term_keywords_array = explode(",", $get_term_keywords);
          foreach ($term_keywords_array as $keyword): 
          ?>
            <tr class="border-b">
              <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900"><?php echo $keyword; ?></td>
              <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo get_term_link($city->term_id, 'city') ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php get_footer(); ?>