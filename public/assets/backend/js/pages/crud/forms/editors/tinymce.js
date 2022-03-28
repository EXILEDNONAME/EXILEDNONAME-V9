"use strict";
// Class definition

var KTTinymce = function () {
  // Private functions
  var demos = function () {

    tinymce.init({
      selector: '#ex-textarea',
      menubar: true,
      toolbar: false,
      statusbar: false,
      height: 9000,
      forced_root_block : 'div'
    });

    tinymce.init({
      selector: '#ex-textarea-1',

      menubar: false,
      toolbar: false,
      statusbar: false,
      height: 9000,
      forced_root_block : 'div'
    });

    tinymce.init({
      selector: '#ex-textarea-2',
      menubar: false,
      toolbar: false,
      statusbar: false,
      height: 9000,
      forced_root_block : 'div'
    });

    tinymce.init({
      selector: '#kt-tinymce-1',
      toolbar: false,
      statusbar: false
    });

    tinymce.init({
      selector: '#kt-tinymce-2'
    });

    tinymce.init({
      selector: '#kt-tinymce-3',
      toolbar: 'advlist | autolink | link image | lists charmap | print preview',
      plugins : 'advlist autolink link image lists charmap print preview'
    });

    tinymce.init({
      selector: '#kt-tinymce-4',
      menubar: false,
      toolbar: ['styleselect fontselect fontsizeselect',
      'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
      'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
      plugins : 'advlist autolink link image lists charmap print preview code'
    });
  }

  return {
    // public functions
    init: function() {
      demos();
    }
  };
}();

// Initialization
jQuery(document).ready(function() {
  KTTinymce.init();
});
