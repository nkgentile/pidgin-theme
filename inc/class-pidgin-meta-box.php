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
		$key = static::$key;

		if ( !wp_verify_nonce( $_POST[$key.'_nonce'], $key ) ) {
			return $post_id; 
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  

		$old = get_post_meta( $post_id, $key, true );
		$new = $_POST[$key];

		if ( $new && $new !== $old ) {
			update_post_meta( $post_id, $key, $new );
		} elseif ( '' === $new && $old ) {
			delete_post_meta( $post_id, $key, $old );
		}
	}

	abstract public static function html( $post );

}
