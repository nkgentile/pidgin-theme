( function( wp ) {
  var el = wp.element.createElement;
  var registerBlockType = wp.blocks.registerBlockType;
  var TextControl = wp.components.TextControl;

  registerBlockType( 'pidgin-issue/date', {
    title: 'Publication Date',
    icon: 'calendar-alt',
    category: 'pidgin-issue',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'pidgin_issue_date'
      }
    },

    edit: function( props ) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue( blockValue ) {
        setAttributes({ blockValue });
      }

      return el(
        'div',
        { className: className },
        el( TextControl, {
          label: 'Publication Date',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        } )
      );
    },

    save: function() {
      return null;
    }
  } );
} )( window.wp );
