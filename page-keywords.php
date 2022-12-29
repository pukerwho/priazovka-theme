<?php
/*
Template Name: Get keywords
*/
?>
<?php get_header(); ?>

<div class="container">
  <?php
  $cities = get_terms( array( 
    'taxonomy' => 'city',
    'orderby' => 'count',
  ) );
  foreach ($cities as $city):
  ?>
    <div><?php echo get_term_link($city->term_id, 'city') ?></div>
    <?php 
      
      $get_term_keywords = carbon_get_term_meta($city->term_id, 'crb_category_keywords');
      // has meta
      if ($get_term_keywords) {
        $term_keywords_array = explode(",", $get_term_keywords);
        foreach ($term_keywords_array as $link) {
          echo '<div>'.$link.'</div>';
        }
      } 
    ?>
  <?php endforeach; ?>
</div>

<?php get_footer(); ?>