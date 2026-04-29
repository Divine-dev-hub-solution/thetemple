(function($) {
  "use strict"

  $(document).ready(function() {

    // Rating field
    $(document).on('click', '.sigma_input-rating .star', function() {
      var ratings = $('.sigma_input-rating .star').index(this) + 1;
      $('.sigma_input-rating .star').removeClass('rated');
      $('.star:lt( ' + ratings + ' )').addClass('rated');
      $(this).parent().next('.sigma_input-rating-val').val(ratings);
    });

    // Upload file field
    $('body').on('click', '.sigma_upload_image_button', function(e) {
      e.preventDefault();

      var button = $(this),
      custom_uploader = wp.media({
        title: 'Insert image',
        library: {
          type: 'image'
        },
        button: {
          text: 'Use this image'
        },
        multiple: false
      }).on('select', function() {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();
      }).open();

    });

    // Remove attached image
    $('body').on('click', '.sigma_remove_image_button', function(){
      $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
      return false;
    });

    // Tabs
    $(".sigma_tab").on('click', function (e) {
        e.preventDefault();

        $(".sigma_tab").removeClass('active');
        $(".sigma_tab-item").removeClass('active');

        $(this).addClass('active');
        $($(this).data('target')).addClass('active');

    });
    // Sigmacore color picker
    $(function () {
        $('.sigma_meta_color_field').wpColorPicker();
    });
    // Meta required filter
        var filters = ['.sigma_input-field .sigma_input-field-container'];
        $.each(filters, function (index, filter) {
            $(filter + '[data-required]').each(function () {
                var $el = $(this),
                    id = $el.data('required'),
                    value = $el.data('value'),
                    $required = $(filter + ' [name="' + id + '"]'),
                    type = $required.attr('type');
                if ($required.prop('type') == 'select-one') {
                    $required.change(function () {
                        if ($.inArray($required.val(), value.split(',')) !== -1) {
                            $el.show();
                        } else {
                            $el.hide();
                        }
                    });
                    $required.change();
                } else {
                    if (type == 'checkbox') {
                        $required.change(function () {
                            if ($(this).is(':checked')) {
                                if (value) {
                                    $el.show();
                                } else {
                                    $el.hide();
                                }
                            } else {
                                if (!value) {
                                    $el.show();
                                } else {
                                    $el.hide();
                                }
                            }
                        });
                        $required.change();
                    }
                }
            });
        });



  });

})(jQuery);
