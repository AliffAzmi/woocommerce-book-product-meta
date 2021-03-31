<?php
/**
 * Plugin Name: Woocommerce Book Product Meta
 * Plugin URI: http://domain.com
 * Description: Add extra info for books products
 * Author: Aliff Azmi
 * Author URI: http://domain.com
 * Version: 1.0
 */

add_filter( 'rwmb_meta_boxes', 'books_meta_boxes' );
function books_meta_boxes( $meta_boxes )
{
	$meta_boxes[] = array(
		'title'      => __( 'Extra Product Info', 'books' ),
		'post_types' => 'product',
		'fields'     => array(
			array(
				'id'   => 'softcover',
				'name' => __( 'Softcover', 'books' ),
				'type' => 'text',
			),
			array(
				'id'   => 'publisher',
				'name' => __( 'Publisher', 'books' ),
				'type' => 'text',
			),
			array(
				'id'   => 'language',
				'name' => __( 'Language', 'books' ),
				'type' => 'text',
			),
			array(
				'id'   => 'isbn',
				'name' => __( 'ISBN', 'books' ),
				'type' => 'text',
			),
			array(
				'id'   => 'product_dimensions',
				'name' => __( 'Product Dimensions', 'books' ),
				'type' => 'text',
			)
		),
	);
	return $meta_boxes;
}

add_action( 'woocommerce_product_meta_end', 'books_extra_info_end' );
function books_extra_info_end() {
	if ( $meta = get_post_meta( get_the_ID(), 'softcover', true ) ){
		echo '<br>'. __( 'Softcover', 'books' ) . ": <strong>$meta</strong><br>";
	}
	if ( $meta = get_post_meta( get_the_ID(), 'publisher', true ) ){
		echo __( 'Publisher', 'books' ) . ": <strong>$meta</strong><br>";
	}
	if ( $meta = get_post_meta( get_the_ID(), 'language', true ) ){
		echo __( 'Language', 'books' ) . ": <strong>$meta</strong><br>";
	}
	if ( $meta = get_post_meta( get_the_ID(), 'isbn', true ) ){
		echo __( 'ISBN', 'books' ) . ": <strong>$meta</strong><br>";
	}
	if ( $meta = get_post_meta( get_the_ID(), 'product_dimensions', true ) ){
		echo __( 'Product Dimensions', 'books' ) . ": <strong>$meta</strong><br>";
	}
}
