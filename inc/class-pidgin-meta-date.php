<?php

require_once get_template_directory() . '/inc/class-pidgin-meta-box.php';

abstract class PidginMetaDate extends PidginMetaBox {

	static public $key = 'pidgin_issue_date';
	static public $title = 'Publication Date';
	static public $description = '';

	public static function html( $post ) {
	    $key = self::$key;
	    $description = self::$description;
	    $value = get_post_meta( $post->ID, $key, true );
	    ?>
	      <input type="hidden" name="<?= $key.'_nonce' ?>" value="<?php echo wp_create_nonce( $key ); ?>">
	      <label for="<?= $key ?>"><?= __( $description, 'pidgin-theme' ) ?></label>
	      <br/>
	      <input type="text" name="<?= $key ?>" id="<?= $key ?>" class="regular-text" value="<?= $value ?>">
	    <?php
	}

}
