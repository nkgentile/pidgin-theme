<?php

abstract class PidginMetaBox {

	public static function add() {
		$screens = array( 'pidgin-issue' );
		foreach ($screens as $screen) {
			add_meta_box(
				static::$key,               // Unique ID
				static::$title,  		 // Box title
				[static::class, 'html'],   // Content callback, must be of type callable
				$screen,                  // Post type
				'side'
			);
		}
	}

	public static function save( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );

		$key = static::$key;
    $empty_meta = !isset( $_POST[$key] );
    $nonce = $_POST[$key.'_nonce'];
    $is_invalid_nonce = !isset( $nonce ) || !wp_verify_nonce( $nonce, basename( $key ) );
    $cant_edit = !current_user_can( 'edit_post', $post_id );

    if(
      $empty_meta
      || $cant_edit
      || $is_invalid_nonce
      || $is_autosave
      || $is_revision 
    ) {
      return $post_id;
    } else {
      update_post_meta( $post_id, $key, sanitize_text_field( $_POST[$key] ) );
    }

	}

	abstract public static function html( $post );

}
