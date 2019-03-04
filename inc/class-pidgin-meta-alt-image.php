<?php

require_once get_template_directory() . '/inc/class-pidgin-meta-box.php';

abstract class PidginMetaAltImage extends PidginMetaBox {

  static public $key = 'pidgin_issue_alt_image';
  static public $title = 'Alternate Image';
  static public $description = 'Image to appear when hovering on a Pidgin issue card';

  public static function html( $post ) {
    $key = self::$key;
    $description = self::$description;
    $value = get_post_meta( $post->ID, $key, true );
    ?>
      <div class="image-preview">
          <img src="<?= $value ?>" style="max-width: 250px;">
      </div>
      <p>
        <input type="hidden" name="<?= $key.'_nonce' ?>" value="<?php echo wp_create_nonce( $key ); ?>">
        <input type="hidden" name="<?= $key ?>" id="<?= $key ?>" class="meta-image" value="<?= $value ?>">
        <input type="button" class="button image-upload" value="Replace image">
      </p>
      <script>
      jQuery(document).ready(function ($) {
          // Instantiates the variable that holds the media library frame.
          var meta_image_frame;
          // Runs when the image button is clicked.
          $('.image-upload').click(function (e) {
              // Get preview pane
              var meta_image_preview = $(this).parent().parent().children('.image-preview');
              // Prevents the default action from occuring.
              e.preventDefault();
              var meta_image = $(this).parent().children('.meta-image');
              // If the frame already exists, re-open it.
              if (meta_image_frame) {
              meta_image_frame.open();
              return;
              }
              // Sets up the media library frame
              meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                title: meta_image.title,
                button: {
                  text: meta_image.button
                }
              });
              // Runs when an image is selected.
              meta_image_frame.on('select', function () {
                // Grabs the attachment selection and creates a JSON representation of the model.
                var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                // Sends the attachment URL to our custom image input field.
                meta_image.val(media_attachment.url);
                meta_image_preview.children('img').attr('src', media_attachment.url);
              });
              // Opens the media library frame.
              meta_image_frame.open();
          });
      });
      </script>
      <?php
  }

}
