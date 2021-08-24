jQuery(function ($) {
  'use strict';

  $('[data-toggle="tooltip"]').tooltip();

  $('#upload_button').html('Create Album');
  $('#contentsModalId').find('#upload_album_track').html('Create Album');
  $('#contentsModalId').find('#content_genere_div').css('display', 'none');
  $('#contentsModalId').find('#content_track_div').css('display', 'none');
  loadContents('1');

  $('body').on('click', '.profile-tab .nav-link', function () {
    var dtarget = $(this).attr('id');

    if (dtarget == 'pills-album-tab') {
      $('#upload_button').html('Create Album');
      $('#contentsModalId').find('#content_genere_div').css('display', 'none');
      $('#contentsModalId').find('#content_track_div').css('display', 'none');
      $('#contentsModalId').find('#upload_album_track').html('Create Album');
      $('#contentsModalId').find('.modal-header h2').html('Create Album');
      $('#contentsModalId').find('#content_type').val('2');
      loadContents('1');
    } else if (dtarget == 'pills-track-tab') {
      $('#upload_button').html('Upload Tracks');
      $('#contentsModalId').find('#content_genere_div').css('display', 'block');
      $('#contentsModalId').find('#content_track_div').css('display', 'block');
      $('#contentsModalId').find('#upload_album_track').html('Upload Track');
      $('#contentsModalId').find('.modal-header h2').html('Upload Tracks');
      $('#contentsModalId').find('#content_type').val('1');
      loadContents('2');
    }
  });

  $('body').on('change', '#content_type', function () {
    var content_type = $('#content_type :selected').val();

    if (content_type == '1') {
      $('#content_genere_div').show();
      $('#content_track_div').show();
      $('#upload_album_track').html('Upload Track');
    } else if (content_type == '2') {
      $('#content_genere_div').hide();
      $('#content_track_div').hide();
      $('#upload_album_track').html('Create Album');
    }
  });

  // This set of validators requires the File API, so if we'ere in a browser
  // that isn't sufficiently "HTML5"-y, don't even bother creating them.  It'll
  // do no good, so we just automatically pass those tests.
  var is_supported_browser = !!window.File,
    fileSizeToBytes,
    formatter = $.validator.format;

  /**
   * Converts a measure of data size from a given unit to bytes.
   *
   * @param number size
   *   A measure of data size, in the give unit
   * @param string unit
   *   A unit of data.  Valid inputs are "B", "KB", "MB", "GB", "TB"
   *
   * @return number|bool
   *   The number of bytes in the above size/unit combo.  If an
   *   invalid unit is specified, false is returned
   */
  fileSizeToBytes = (function () {
    var units = ['B', 'KB', 'MB', 'GB', 'TB'];

    return function (size, unit) {
      var index_of_unit = units.indexOf(unit),
        coverted_size;

      if (index_of_unit === -1) {
        coverted_size = false;
      } else {
        while (index_of_unit > 0) {
          size *= 1024;
          index_of_unit -= 1;
        }

        coverted_size = size;
      }

      return coverted_size;
    };
  })();

  $.validator.addMethod(
    'minFileSize',
    function (value, element, params) {
      var files,
        unit = params.unit || 'KB',
        size = params.size || 100,
        min_file_size = fileSizeToBytes(size, unit),
        is_valid = false;

      if (!is_supported_browser || this.optional(element)) {
        is_valid = true;
      } else {
        files = element.files;

        if (files.length < 1) {
          is_valid = false;
        } else {
          is_valid = files[0].size >= min_file_size;
        }
      }

      return is_valid;
    },
    function (params, element) {
      return formatter('File must be at least {0}{1} large.', [
        params.size || 100,
        params.unit || 'KB',
      ]);
    }
  );

  $.validator.addMethod(
    'maxFileSize',
    function (value, element, params) {
      var files,
        unit = params.unit || 'KB',
        size = params.size || 100,
        max_file_size = fileSizeToBytes(size, unit),
        is_valid = false;

      if (!is_supported_browser || this.optional(element)) {
        is_valid = true;
      } else {
        files = element.files;

        if (files.length < 1) {
          is_valid = false;
        } else {
          is_valid = files[0].size <= max_file_size;
        }
      }

      return is_valid;
    },
    function (params, element) {
      return formatter('File cannot be larger than {0}{1}.', [
        params.size || 100,
        params.unit || 'KB',
      ]);
    }
  );

  $('#form_album_tracks').validate({
    rules: {
      content_title: {
        required: true,
      },
      content_desc: {
        minlength: 10,
        maxlength: 255,
      },
      content_cover_image: {
        extension: 'jpg,jpeg,png',
        maxFileSize: {
          unit: 'KB',
          size: '10000',
        },
      },
      content_track: {
        extension: 'mp3',
        maxFileSize: {
          unit: 'KB',
          size: '30000',
        },
      },
    },
    messages: {
      content_title: {
        required: 'Enter Title',
      },
      content_desc: {
        minlength: 'Minimum 10 charachters required',
        maxlength: 'maximum 255 charachters are allowed',
      },
      content_cover_image: {
        extension: 'Allowed files types are jpg,jpeg,png',
      },
      content_track: {
        extension: 'Only mp3 files are alowed',
      },
    },
    submitHandler: function () {
      var content_type = $('#content_type :selected').val();
      var c_t = '2';

      var cid = $('#content_id').val();

      if (content_type == '1') {
        c_t = '2';
      } else if (content_type == '2') {
        c_t = '1';
      }
      $.ajax({
        type: 'POST',
        url: base_url + 'upload_contents',
        data: new FormData($('#form_album_tracks')[0]),
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000000,
        target: '.preview',
        beforeSend: function () {
          $('#upload_album_track')
            .html(
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            )
            .prop('disabled', true);
        },
        success: function (f) {
          if (f.success) {
            $('#upload_album_track').prop('disabled', true);
            loadContents(c_t);
            if (cid === '') {
              $('#form_album_tracks')[0].reset();
            }
            if (c_t == '1') {
              $('#contentsModalId').find('#content_type').val('2');
              swal(f.success + '. Want to upload Tracks Now?', {
                icon: 'success',
                allowOutsideClick: false,
                buttons: {
                  cancel: 'Upload Later',
                  catch: {
                    text: 'Upload Now',
                    value: 'catch',
                  },
                },
              }).then((value) => {
                switch (value) {
                  case 'catch':
                    $('#contentsModalId').modal('hide');
                    $('#contentsModalTracksId')
                      .find('#content_album_id')
                      .val(f.uploaded_album);
                    $('#contentsModalTracksId').modal('show');
                    break;

                  default:
                }
              });
            } else {
              $('#contentsModalId').find('#content_type').val('1');
              swal(f.success, {
                icon: 'success',
                allowOutsideClick: false,
              });
            }
          } else if (f.error) {
            $('#upload_album_track').prop('disabled', true);
            swal(f.error, {
              icon: 'error',
              allowOutsideClick: false,
            });
          } else if (f.redirect) {
            $('#upload_album_track').prop('disabled', true);
            alert(f.success);
            // Swal.fire({
            //   icon: 'info',
            //   title: 'Your session expired',
            //   confirmButtonText:'Close',
            //   confirmButtonColor:'#69da68',
            //   allowOutsideClick: false,
            // });
          }
        },
        xhr: function () {
          //Get XmlHttpRequest object
          var xhr = $.ajaxSettings.xhr();
          //Set onprogress event handler
          xhr.upload.onprogress = function (data) {
            var perc = (data.loaded / data.total) * 100; // Math.round((data.loaded / data.total) * 100);
            $('.progress-bar')
              .css('width', perc.toFixed(2) + '%')
              .text(perc.toFixed(2) + '%');
          };
          return xhr;
        },
        error: function (e) {},
        complete: function (status, xhr) {
          $('.progress-bar').css('width', '0%').text('0%');
          if ($('#content_type :selected').val() == '1') {
            var txt = 'Upload Track';
          } else {
            var txt = 'Create Album';
          }
          $('#upload_album_track').html(txt).attr('disabled', false);
        },
        resetForm: true,
      });
    },
  });

  $('#form_album_only_tracks').validate({
    rules: {
      content_title: {
        required: true,
      },
      content_desc: {
        minlength: 10,
        maxlength: 255,
      },
      content_cover_image: {
        extension: 'jpg,jpeg,png',
        maxFileSize: {
          unit: 'KB',
          size: '10000',
        },
      },
      content_track: {
        extension: 'mp3',
        maxFileSize: {
          unit: 'KB',
          size: '30000',
        },
      },
    },
    messages: {
      content_title: {
        required: 'Enter Title',
      },
      content_desc: {
        minlength: 'Minimum 10 charachters required',
        maxlength: 'maximum 255 charachters are allowed',
      },
      content_cover_image: {
        extension: 'Allowed files types are jpg,jpeg,png',
      },
      content_track: {
        extension: 'Only mp3 files are alowed',
      },
    },
    submitHandler: function () {
      var content_type = $('#content_type').val();
      var c_t = '2';

      var album = $('#form_album_only_tracks').find('#content_album_id').val();

      if (content_type == '1') {
        c_t = '2';
      } else if (content_type == '2') {
        c_t = '1';
      }
      $.ajax({
        type: 'POST',
        url: base_url + 'upload_contents',
        data: new FormData($('#form_album_only_tracks')[0]),
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000000,
        target: '.preview',
        beforeSend: function () {
          $('#upload_album_only_track')
            .html(
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            )
            .prop('disabled', true);
        },
        success: function (f) {
          if (f.success) {
            $('#upload_album_only_track').prop('disabled', true);
            loadContents(c_t);
            $('#form_album_only_tracks')[0].reset();
            $('#form_album_only_tracks').find('#content_album_id').val(album);
            swal(f.success, {
              icon: 'success',
              allowOutsideClick: false,
            });
          } else if (f.error) {
            $('#upload_album_only_track').prop('disabled', true);
            swal(f.error, {
              icon: 'error',
              allowOutsideClick: false,
            });
          } else if (f.redirect) {
            $('#upload_album_only_track').prop('disabled', true);
            alert(f.success);
          }
        },
        xhr: function () {
          //Get XmlHttpRequest object
          var xhr = $.ajaxSettings.xhr();
          //Set onprogress event handler
          xhr.upload.onprogress = function (data) {
            var perc = (data.loaded / data.total) * 100; // Math.round((data.loaded / data.total) * 100);
            $('.progress-bar')
              .css('width', perc.toFixed(2) + '%')
              .text(perc.toFixed(2) + '%');
          };
          return xhr;
        },
        error: function (e) {},
        complete: function (status, xhr) {
          $('.progress-bar').css('width', '0%').text('0%');

          $('#upload_album_only_track')
            .html('Upload Track')
            .attr('disabled', false);
        },
        resetForm: true,
      });
    },
  });

  $('body').on('click', '.btn_delete', function () {
    var content_type = $(this).attr('data-content_type');
    var content_id = $(this).attr('data-content_id');

    if (content_type == '1') {
      var msg =
        'Once deleted, you will not be able to recover the album & tracks';
    } else if (content_type == '2') {
      var msg = 'Once deleted, you will not be able to recover the track';
    }

    swal({
      title: 'Are you sure?',
      text: msg,
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'POST',
          url: base_url + 'delete_contents',
          data: { _content_type: content_type, _content_type_id: content_id },
          beforeSend: function () {},
          success: function (d) {
            if (d.success) {
              if (content_type == '1') {
                $('#albumdiv_' + content_id).remove();
              } else if (content_type == '2') {
                $('#contentdiv_' + content_id).remove();
              }

              swal(d.success, {
                icon: 'success',
              });
            } else if (d.error) {
              swal(d.error, {
                icon: 'error',
              });
            }
          },
        });
      }
    });
  });

  $('body').on('click', '.btn_upload_track', function () {
    $('#form_album_only_tracks')
      .find('#content_album_id')
      .val($(this).attr('data-album'));
    $('#contentsModalTracksId').modal('show');
  });

  $('body').on('click', '.btn_album_edit', function () {
    $('#contentsModalId').find('#content_id').val($(this).attr('data-album'));
    $('#contentsModalId')
      .find('#content_title')
      .val($(this).attr('data-album_name'));
    $('#contentsModalId')
      .find('#content_desc')
      .val($(this).attr('data-album_about'));
    $('#contentsModalId').find('.modal-header h2').html('Update Album');
    $('#contentsModalId').modal('show');
  });

  $('body').on('click', '.btn_content_edit', function () {
    $('#contentsModalId').find('#content_id').val($(this).attr('data-content'));
    $('#contentsModalId')
      .find('#content_title')
      .val($(this).attr('data-content_name'));
    $('#contentsModalId')
      .find('#content_desc')
      .val($(this).attr('data-content_about'));
    $('#contentsModalId').find('.modal-header h2').html('Update Track');
    $('#contentsModalId').modal('show');
  });

  function loadContents(content_type) {
    var html = '';
    $.ajax({
      type: 'POST',
      url: base_url + 'load_contents',
      data: { _content_type: content_type },
      beforeSend: function () {},
      success: function (d) {
        if (d != '') {
          if (content_type == '2') {
            $.each(d, function (k, v) {
              html +=
                '<div class="col-lg-4 col-sm-6 mb-4"><div class="top-item" id="contentdiv_' +
                v.content_id +
                '"><img src="' +
                v.content_image +
                '" class="content_img" loading="lazy"/><div class="btn-group btn_group"><button type="button" class="btn btn-xs btn-success btn_content_edit" data-content="' +
                v.content_id +
                '" data-content_name="' +
                v.content_track_name +
                '"  data-content_about="' +
                v.content_about +
                '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button><button class="btn btn-xs btn-danger btn_delete" data-content_type="2" data-content_id="' +
                v.content_id +
                '"><i class="fa fa-trash"></i></button></div></div></div>';
            });
          } else if (content_type == '1') {
            $.each(d, function (k, v) {
              html +=
                '<div class="col-lg-4 col-sm-6 mb-4"><div class="top-item" id="albumdiv_' +
                v.album_id +
                '"><img src="' +
                v.album_image_file +
                '" class="content_img" loading="lazy"/>';
              html += '<div class="btn-group btn_group">';
              html +=
                '<button type="button" class="btn btn-xs btn-warning btn_upload_track" data-album="' +
                v.album_id +
                '" data-toggle="tooltip" data-placement="top" title="Upload Tracks"><i class="fa fa-upload" aria-hidden="true"></i></button>';
              html +=
                '<button type="button" class="btn btn-xs btn-success btn_album_edit" data-album="' +
                v.album_id +
                '" data-album_name="' +
                v.album_name +
                '"  data-album_about="' +
                v.album_about +
                '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>';
              html +=
                '<button class="btn btn-xs btn-danger btn_delete" data-content_type="1" data-content_id="' +
                v.album_id +
                '"><i class="fa fa-trash"  aria-hidden="true"></i></button>';
              html += '</div>';

              html += '</div></div>';
            });
          }
        }

        if (content_type == '1') {
          $('#album_div').html(html);
        } else if (content_type == '2') {
          $('#tracks_div').html(html);
        }
      },
    });
  }
});

function openListoftracks(contributor_id) {
 //alert(contributor_id);
  var html = '';
  $.ajax({
    type: 'POST',
    url: base_url + 'load_contributorsong',
    data: { contributor_id: contributor_id },
    beforeSend: function () {},
    success: function (d) {
      if (d != '') {
         //console.log(d);
        $.each(d, function (k, v) {
          let className = k === 0 ? 'active' : '';
          html +=
            '<li class="' +
            className +
            '" data-cover="' +
            v.content_image +
            '"  data-source="' +
            v.content_track +
            '"><div class="track_name">' +
            v.content_track_name +
            '</div></li>';
        });
      }
      $('#contributorlist').html(html);
      playListInit();
    },
  });
}

