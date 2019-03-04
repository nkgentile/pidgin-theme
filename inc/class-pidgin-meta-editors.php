<?php

require_once get_template_directory() . '/inc/class-pidgin-meta-box.php';

abstract class PidginMetaEditors extends PidginMetaBox {

  static public $key = 'pidgin_issue_editors';
  static public $title = 'Editors';
  static public $description = '';

  public static function html( $post ) {
    $key = self::$key;
    $description = self::$description;
    $value = get_post_meta( $post->ID, $key, true );
    ?>
      <p class="pidgin-editors">
        <input type="hidden" name="<?= $key.'_nonce' ?>" value="<?php echo wp_create_nonce( $key ); ?>">
        <input type="hidden" name="<?= $key ?>" id="<?= $key ?>" value="<?= $value ?>">
      </p>
      <button class="button add-pidgin-editor">Add Editor</button>
      <script>
      (function($){
        $(document).ready(function(){
          var container = $('.pidgin-editors');
          container.on('input', function(event){
            var editors = $('input.pidgin-issue-editor').map(function(){
              return $(this).val();
            })
            .get();

            $('[name="<?= $key ?>"]').val(editors);

          });

          var editor_html = '<input type="text" class="pidgin-issue-editor">';
          $('.add-pidgin-editor').click(function(){
            $(container).append(editor_html);
          });
        });
      })(jQuery);
      </script>
      <?php
  }

}
