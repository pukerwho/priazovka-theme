<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
  ->add_fields( array(
    Field::make( 'html', 'crb_heading_seo', __( 'SEO Heading' ) )->set_html( sprintf( '<b>SEO</b>' ) ),
    Field::make( 'text', 'crb_category_heading', 'h1' ),
    Field::make( 'text', 'crb_category_title', 'Title' ),
    Field::make( 'text', 'crb_category_description', 'Description' ),
    Field::make( 'textarea', 'crb_category_keywords', 'Keywords' ),
    Field::make( 'html', 'crb_heading_info', __( 'INFO Heading' ) )->set_html( sprintf( '<b>INFO</b>' ) ),
    Field::make( 'text', 'crb_category_count_people', 'Кількість мешканців' ),
    Field::make( 'text', 'crb_category_oblast', 'Область' ),
    Field::make( 'html', 'crb_heading_settings', __( 'SETTINGS Heading' ) )->set_html( sprintf( '<b>Settings</b>' ) ),
    Field::make( 'text', 'crb_category_emoji', 'Emoji' ),
    Field::make( 'checkbox', 'crb_category_show', 'Show?' ),
  ));

  Container::make( 'term_meta', __( 'City Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
  ->add_fields( array(
    Field::make( 'image', 'crb_city_img', 'Заглавная картинка' )->set_value_type( 'url'),
  ));
}

?>
