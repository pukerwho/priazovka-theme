<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'checkbox', 'crb_post_top', 'TOP-TOP?' ),
      Field::make( 'html', 'crb_heading_seo', __( 'INFO Heading' ) )->set_html( sprintf( '<b>SEO</b>' ) ),
      Field::make( 'text', 'crb_post_title', 'Title' ),
      Field::make( 'text', 'crb_post_description', 'Description' ),
      Field::make( 'text', 'crb_post_keywords', 'Keywords' ),

      Field::make( 'html', 'crb_heading_author', __( 'INFO Heading' ) )->set_html( sprintf( '<b>АВТОР</b>' ) ),
      Field::make( 'text', 'crb_post_author', 'Автор' ),
      Field::make( 'text', 'crb_post_author_instagram', 'Інстаграм автора' ),
      Field::make( 'text', 'crb_post_author_facebook', 'Фейсбук автора' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'hotels' )
    ->add_fields( array(
      Field::make( 'text', 'crb_hotels_rating', 'Рейтинг отеля' ),
      Field::make( 'text', 'crb_hotels_phones', 'Телефоны' ),
      Field::make( 'text', 'crb_hotels_address', 'Адрес' ),
      Field::make( 'text', 'crb_place_reviews_count', 'Кол-во отзывов' ),
      
      Field::make( 'text', 'crb_hotels_vanna', 'Ванна' ),
      Field::make( 'text', 'crb_hotels_fen', 'Фен' ),
      Field::make( 'text', 'crb_hotels_shampoo', 'Шампунь' ),
      Field::make( 'text', 'crb_hotels_hotwater', 'Горячая вода' ),
      Field::make( 'text', 'crb_hotels_stiralka', 'Стиральная машина' ),
      Field::make( 'text', 'crb_hotels_prostin', 'Простыни' ),
      Field::make( 'text', 'crb_hotels_plechiki', 'Плечики' ),
      Field::make( 'text', 'crb_hotels_postel', 'Постельное белье' ),
      Field::make( 'text', 'crb_hotels_jaluzi', 'Жалюзи' ),
      Field::make( 'text', 'crb_hotels_utug', 'Утюг' ),
      Field::make( 'text', 'crb_hotels_tv', 'Телевизор' ),
      Field::make( 'text', 'crb_hotels_conder', 'Кондиционер' ),
      Field::make( 'text', 'crb_hotels_otoplenie', 'Отопление' ),
      Field::make( 'text', 'crb_hotels_wifi', 'Wi-Fi' ),
      Field::make( 'text', 'crb_hotels_kitchen', 'Кухня' ),
      Field::make( 'text', 'crb_hotels_microwave', 'Микроволновая печь' ),
      Field::make( 'text', 'crb_hotels_mini_holod', 'Мини-холодильник' ),
      Field::make( 'text', 'crb_hotels_plita', 'Электроплита' ),
      Field::make( 'text', 'crb_hotels_chainik', 'Чайник' ),
      Field::make( 'text', 'crb_hotels_miniseif', 'Мини-сейф' ),
      Field::make( 'text', 'crb_hotels_krovatka', 'Кроватка' ),
      Field::make( 'text', 'crb_hotels_ognetushitel', 'Огнетушитель' ),
      Field::make( 'text', 'crb_hotels_aptechka', 'Аптечка' ),
      Field::make( 'text', 'crb_hotels_parkovka', 'Парковка' ),
  ) );
}

?>