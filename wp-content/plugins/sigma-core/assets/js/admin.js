(function($) {
"use strict"
$(document).ready(function() {

  // Add Row for the volunteer social fields.
  $(document).on('click', '.volunteer-table-row-add', function() {
    var row_add = '';
    var current_row = $('.volunteer-social-icon-table tr').length;
    row_add = '<tr><td class="row-index">' + current_row + '</td><td class="sigma_input-field"><input class="sigma_text volunteer-social-icons" type="text" name="sigma_volunteer_socials_icon[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_volunteer_socials_link[]" value=""></td><td><a class="volunteer-table-row-remove sigma_link-destructive" href="#">Remove</a></td></tr>';
    $('.volunteer-social-icon-table').append(row_add);
    $('.volunteer-social-icon-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.volunteer-social-icon-table tr').length - 1;
    $('input[name="sigma_volunteer_socials_total"]').val(total_row);
    sigmacore_social_iconpicker();
  });

  // Remove Row for the volunteer social fields.
  $(document).on('click', '.volunteer-table-row-remove', function(event) {
    event.preventDefault();
    $(this).parents('tr').remove()
    $('.volunteer-social-icon-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.volunteer-social-icon-table tr').length - 1;
    $('input[name="sigma_volunteer_socials_total"]').val(total_row);
  });

  // Add Row for the  contact details social fields.
  $(document).on('click', '.event-authors-table-row-add', function() {
      var row_add = '';
      var current_row = $('.event-author-details-table tr').length;
      row_add = '<tr><td class="row-index">' + current_row + '</td><td class="sigma_input-field"><input class="sigma_text event-author-name" type="text" name="sigma_event_authors_name[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_event_authors_time[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_event_authors_image[]" value=""></td><td class="sigma_input-field"><textarea class="sigma_text" id="sigma_event_authors_description[]" name="sigma_event_authors_description[]" ></textarea></td><td><a class="event-authors-row-remove sigma_link-destructive" href="#">Remove</a></td></tr>';
      $('.event-author-details-table').append(row_add);
      $('.event-author-details-table td.row-index').each(function(index) {
          $(this).text(index + 1);
      });
      var total_row = $('.event-author-details-table tr').length - 1;
      $('input[name="sigma_event_authors_total"]').val(total_row);
  });
  // Remove Row for the listing contact details social fields.
  $(document).on('click', '.event-authors-row-remove', function(event) {
      event.preventDefault();
      $(this).parents('tr').remove()
      $('.event-author-details-table td.row-index').each(function(index) {
          $(this).text(index + 1);
      });
      var total_row = $('.event-author-details-table tr').length - 1;
      $('input[name="sigma_event_authors_total"]').val(total_row);
  });
  // Add Row for the  contact details social fields.
  $(document).on('click', '.philosophy-authors-table-row-add', function() {
      var row_add = '';
      var current_row = $('.philosophy-author-details-table tr').length;
      row_add = '<tr><td class="row-index">' + current_row + '</td><td class="sigma_input-field"><input class="sigma_text philosophy-author-name" type="text" name="sigma_philosophy_authors_name[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_philosophy_authors_time[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_philosophy_authors_image[]" value=""></td><td class="sigma_input-field"><textarea class="sigma_text" id="sigma_philosophy_authors_description[]" name="sigma_philosophy_authors_description[]" ></textarea></td><td><a class="philosophy-authors-row-remove sigma_link-destructive" href="#">Remove</a></td></tr>';
      $('.philosophy-author-details-table').append(row_add);
      $('.philosophy-author-details-table td.row-index').each(function(index) {
          $(this).text(index + 1);
      });
      var total_row = $('.philosophy-author-details-table tr').length - 1;
      $('input[name="sigma_philosophy_authors_total"]').val(total_row);
  });
  // Remove Row for the listing contact details social fields.
  $(document).on('click', '.philosophy-authors-row-remove', function(event) {
      event.preventDefault();
      $(this).parents('tr').remove()
      $('.philosophy-author-details-table td.row-index').each(function(index) {
          $(this).text(index + 1);
      });
      var total_row = $('.philosophy-author-details-table tr').length - 1;
      $('input[name="sigma_philosophy_authors_total"]').val(total_row);
  });


  // Add Row for the service features fields.
  $(document).on('click', '.service-table-row-add', function() {
    var row_add = '';
    var current_row = $('.features-table tr').length;
    row_add = '<tr><td class="row-index">' + current_row + '</td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_service_featured_title[]" value=""></td><td><a class="service-table-row-remove sigma_link-destructive" href="#">Remove</a></td></tr>';
    $('.features-table').append(row_add);
    $('.features-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.features-table tr').length - 1;
    $('input[name="sigma_service_features_total"]').val(total_row);
    sigmacore_social_iconpicker();
  });

  // Remove Row for the service features fields.
  $(document).on('click', '.service-table-row-remove', function(event) {
    event.preventDefault();
    $(this).parents('tr').remove()
    $('.features-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.features-table tr').length - 1;
    $('input[name="sigma_service_features_total"]').val(total_row);
  });



    sigmacore_social_iconpicker();
    sigmacore_ammenities_iconpicker();
    sigmacore_service_iconpicker();

    // metafield datepicker
  $(".date-input-field").datepicker();

  $('.time-input-field').timepicker({
    timeFormat: 'hh:mmtt',
    controlType: 'select',
    oneLine: true,
	});

});

  // Social Icon picker.
  function sigmacore_social_iconpicker() {
    var icons_array = [];
    $.each(
      sigmacore_object.sigmacore_get_social_icons,
      function(icon_key, icon_val) {
        var icon_key = Object.entries(icon_val);
        icons_array.push({
          title: icon_key[0][0],
          searchTerms: icon_key[0][1]
        })
      }
    );
    var options = {
      icons: icons_array,
      inputSearch: true,
    }
    $('.volunteer-social-icons').iconpicker(options);
  }

  function sigmacore_ammenities_iconpicker() {
    var icons_array = [];
    $.each(
      sigmacore_object.sigmacore_get_ammenities_icons,
      function(icon_key, icon_val) {
        var icon_key = Object.entries(icon_val);
        icons_array.push({
          title: icon_key[0][0],
          searchTerms: icon_key[0][1]
        })
      }
    );
    var options = {
      icons: icons_array,
      inputSearch: true,
    }
    $('.ammenity-icons').iconpicker(options);
  }


    function sigmacore_service_iconpicker() {
      var icons_array = [];
      $.each(
        sigmacore_object.sigmacore_get_service_icons,
        function(icon_key, icon_val) {
          var icon_key = Object.entries(icon_val);
          icons_array.push({
            title: icon_key[0][0],
            searchTerms: icon_key[0][1]
          })
        }
      );
      var options = {
        icons: icons_array,
        inputSearch: true,
      }
      $('.service-icons').iconpicker(options);
    }
  /*
   * call to action widget
   */
   function media_upload(button_selector) {
    var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;
    $('body').on('click', button_selector, function() {
      var button_id = $(this).attr('id');
      wp.media.editor.send.attachment = function(props, attachment) {
        if (_custom_media) {
          $('.' + button_id + '_img').attr('src', attachment.url);
          $('.' + button_id + '_url').val(attachment.url);
        } else {
          return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
        }
      }
      wp.media.editor.open($('#' + button_id));
      return false;
    });
   }
   media_upload('.js_custom_upload_media');

})(jQuery);
