<?php

/**
 * Registers the `pidgin_issue` post type.
 */
function pidgin_issue_init() {
	register_post_type( 'pidgin-issue', array(
		'labels'                => array(
			'name'                  => __( 'Issues', 'pidgin-theme' ),
			'singular_name'         => __( 'Issue', 'pidgin-theme' ),
			'all_items'             => __( 'All Issues', 'pidgin-theme' ),
			'archives'              => __( 'Issue Archives', 'pidgin-theme' ),
			'attributes'            => __( 'Issue Attributes', 'pidgin-theme' ),
			'insert_into_item'      => __( 'Insert into issue', 'pidgin-theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this issue', 'pidgin-theme' ),
			'featured_image'        => _x( 'Featured Image', 'pidgin-issue', 'pidgin-theme' ),
			'set_featured_image'    => _x( 'Set featured image', 'pidgin-issue', 'pidgin-theme' ),
			'remove_featured_image' => _x( 'Remove featured image', 'pidgin-issue', 'pidgin-theme' ),
			'use_featured_image'    => _x( 'Use as featured image', 'pidgin-issue', 'pidgin-theme' ),
			'filter_items_list'     => __( 'Filter issues list', 'pidgin-theme' ),
			'items_list_navigation' => __( 'Issues list navigation', 'pidgin-theme' ),
			'items_list'            => __( 'Issues list', 'pidgin-theme' ),
			'new_item'              => __( 'New Issue', 'pidgin-theme' ),
			'add_new'               => __( 'Add New', 'pidgin-theme' ),
			'add_new_item'          => __( 'Add New Issue', 'pidgin-theme' ),
			'edit_item'             => __( 'Edit Issue', 'pidgin-theme' ),
			'view_item'             => __( 'View Issue', 'pidgin-theme' ),
			'view_items'            => __( 'View Issues', 'pidgin-theme' ),
			'search_items'          => __( 'Search issues', 'pidgin-theme' ),
			'not_found'             => __( 'No issues found', 'pidgin-theme' ),
			'not_found_in_trash'    => __( 'No issues found in trash', 'pidgin-theme' ),
			'parent_item_colon'     => __( 'Parent Issue:', 'pidgin-theme' ),
			'menu_name'             => __( 'Issues', 'pidgin-theme' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'issues'),
		'query_var'             => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_rest'          => true,
		'rest_base'             => 'pidgin-issue',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

  register_meta( 'pidgin-issue', 'pidgin_issue_date', array(
    'show_in_rest'  => true,
    'single'        => true,
    'type'          => 'string',
    'auth_callback' => function() {
      return current_user_can( 'edit_posts' );
    }
  ) );

}
add_action( 'init', 'pidgin_issue_init' );

/**
 * Sets the post updated messages for the `pidgin_issue` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `pidgin_issue` post type.
 */
function pidgin_issue_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['pidgin-issue'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Issue updated. <a target="_blank" href="%s">View issue</a>', 'pidgin-theme' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'pidgin-theme' ),
		3  => __( 'Custom field deleted.', 'pidgin-theme' ),
		4  => __( 'Issue updated.', 'pidgin-theme' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Issue restored to revision from %s', 'pidgin-theme' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Issue published. <a href="%s">View issue</a>', 'pidgin-theme' ), esc_url( $permalink ) ),
		7  => __( 'Issue saved.', 'pidgin-theme' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Issue submitted. <a target="_blank" href="%s">Preview issue</a>', 'pidgin-theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Issue scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview issue</a>', 'pidgin-theme' ),
		date_i18n( __( 'M j, Y @ G:i', 'pidgin-theme' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Issue draft updated. <a target="_blank" href="%s">Preview issue</a>', 'pidgin-theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'pidgin_issue_updated_messages' );

/**
 * Sets the post updated messages for the `pidgin_issue` post type.
 *
 * @param  object $query Query.
 * @return array Messages for the `pidgin_issue` post type.
 */
function pidgin_issue_add_to_query( $query ) {
	if( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'pidgin-issue' ) );
	return $query;
}
add_action( 'pre_get_posts', 'pidgin_issue_add_to_query' );

/**
 * Register custom block categories
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pidgin_issue_block_categories( $categories, $post ) {
  /*
  if ( $post->post_type !== 'pidgin-issue' ) {
    return $categories;
  }
  */

  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'pidgin-issue',
        'title' => __( 'Issue', 'pidgin-theme' ),
        'icon'  => 'dashicons-book'
      ),
    )
  );
}
add_filter( 'block_categories', 'pidgin_issue_block_categories' );

/**
 * Register custom blocks
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pidgin_theme_blocks_init() {
  wp_enqueue_script(
    'pidgin-issue-block-date',
    get_template_directory_uri() . '/js/blocks/pidgin-issue-date.js',
    array( 'wp-blocks', 'wp-element', 'wp-components' )
  );
}
add_action( 'enqueue_block_editor_assets', 'pidgin_theme_blocks_init' );

function pidgin_theme_add_custom_meta() {
  function pidgin_issue_date_box_html( $post ) {
    $key = 'pidgin_issue_date';
    $value = get_post_meta( $post->ID, $key, true );
    $description = __( 'Publication Date', 'pidgin-theme' );
    ?>
      <input type="hidden" name="pidgin_issue_date_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
      <label for="<?= $key ?>"><?= $description ?></label>
      <br/>
      <input type="text" name="<?= $key ?>" id="<?= $key ?>" class="regular-text" value="<?= $value ?>">
    <?php

  }
  add_meta_box(
    'pidgin_issue_date',
    __( 'Publication Date', 'pidgin-theme' ),
    'pidgin_issue_date_box_html',
    'pidgin-issue'
  );
}
add_action( 'add_meta_boxes', 'pidgin_theme_add_custom_meta' );

function pidgin_issue_date_save( $post_id ) {
  if ( !wp_verify_nonce( $_POST['pidgin_issue_date_nonce'], basename(__FILE__) ) ) {
    return $post_id; 
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return $post_id;
  }

  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }  

  $key = 'pidgin_issue_date';
  $old = get_post_meta( $post_id, $key, true );
  $new = $_POST[$key];

  if ( $new && $new !== $old ) {
    update_post_meta( $post_id, $key, $new );
  } elseif ( '' === $new && $old ) {
    delete_post_meta( $post_id, $key, $old );
  }
}
add_action( 'save_post', 'pidgin_issue_date_save' );
