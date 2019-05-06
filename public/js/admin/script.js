$(document).ready(function () {
    $('.editor').trumbowyg();
    $('[data-toggle="tooltip"]').tooltip();
});

function displayTarget($this) {
    var target = $($this).attr('target-display');
    if (typeof target != 'undefined') {
        if ($(target).hasClass('hidden')) {
            $(target).removeClass('hidden').focus();
        } else {
            $(target).addClass('hidden');
        }
    }
}

function confirmDeleteData(e, message) {
    message = message || $.i18n._('Do_you_want_delete_data?');
    var url = $(e).attr('data-url');
    var deleteData = function () {
        var postAjax = $.ajax({type: 'DELETE', url: url, data: {}});
        postAjax.done(function (result) {
            console.log(result);
            var r = JSON.parse(result);
            if (r.status == true) {
                location.reload();
            } else {
                showModalMessage(r.message, function () {
                    location.reload();
                })
            }
        })
    }
    var mess = '<h4>' + message + '</h4>'
    showModalConfirm(mess, deleteData);
}

function confirmDeleteVendorData(e, message) {
    var url = $(e).attr('data-url');
    var deleteData = function () {
        var postAjax = $.ajax({type: 'DELETE', url: url, data: {}});
        postAjax.done(function (result) {
            console.log(result);
            var r = JSON.parse(result);
            if (r.status == true) {
                location.reload();
            } else {
                showModalMessage(r.message, function () {
                    location.reload();
                })
            }
        })
    }
    var mess = '<h4>' + message + '</h4>'

    showModalConfirm(mess, deleteData);
}

function showModalConfirm(title, callback) {
    var modal =
        '<div id="modal-confirm" class="modal fade" role="dialog">' +
        '   <div class="modal-dialog">' +
        '       <div class="modal-content">' +
        '           <div class="modal-body">' +
        '               <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>' +
        '               <div class="bootbox-body text-center">' + title + '</div>' +
        '           </div>' +
        '           <div class="modal-footer">' +
        '               <button type="button" class="btn btn-sm btn-primary pull-left" id="btn-esc">ESC</button>' +
        '               <button type="button" class="btn btn-sm btn-success pull-right" id="btn-ok">OK</button>' +
        '           </div>' +
        '       </div>' +
        '   </div>' +
        '</div>';
    $('body').append(modal);
    $('.modal').modal('hide');
    $('#modal-confirm').modal('show');
    $('#modal-confirm #btn-ok').click(function () {
        if ($.isFunction(callback)) {
            callback();
        }
    });
    $('#modal-confirm #btn-esc').click(function () {
        $('#modal-confirm').modal('hide');
    });
    $('#modal-confirm').on('hidden.bs.modal', function () {
        $(this).remove();
    });
}

function showModalMessage(title, callback) {
    var modal =
        '<div id="modal-message" class="modal fade" role="dialog">' +
        '   <div class="modal-dialog">' +
        '       <div class="modal-content">' +
        '           <div class="modal-body">' +
        '               <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>' +
        '               <div class="bootbox-body text-center">' + title + '</div>' +
        '           </div>' +
        '           <div class="modal-footer">' +
        '               <button type="button" class="btn btn-sm btn-success pull-right" id="btn-ok">OK</button>' +
        '           </div>' +
        '       </div>' +
        '   </div>' +
        '</div>';
    $('body').append(modal);
    $('.modal').modal('hide');
    $('#modal-message').modal('show');
    $('#modal-message #btn-ok').click(function () {
        if ($.isFunction(callback)) {
            callback();
        }
    });
    $('#modal-message #btn-esc').click(function () {
        $('#modal-message').modal('hide');
    });
    $('#modal-message').on('hidden.bs.modal', function () {
        $(this).remove();
    });
}

function chooseImageUpload(element) {
    var name = $(element).val().split(/(\\|\/)/g).pop();
    var title = $(element).closest('label').find('span.ace-file-name:first').attr('data-old-title');
    if (name == '') {
        name = title;
    }
    $(element).closest('.ace-file-input').find('span.ace-file-name').attr('data-title', name);
}

function changePassword(element) {
    var target = $(element).attr('data-target');
    var url = $(element).attr('data-link');
    var data = $(target).serialize();
    var postAjax = $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $(target).closest('.modal-body').find('.alert').remove();
            $(element).closest('.modal-footer').find('button').attr('disabled', 'disabled');
        }
    });

    postAjax.done(function (res) {
        var mes;
        if (res.status) {
            mes = '<div class="alert-messages-change-password alert alert-success text-left">' + res.message + '</div>';
        } else {
            mes = '<div class="alert-messages-change-password alert alert-danger text-left">' + res.message + '</div>';
        }
        $(target).closest('.modal-body').append(mes);
        $(element).closest('.modal-footer').find('button').removeAttr('disabled');
        $(".alert-messages-change-password").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-messages-change-password").slideUp(500);
        });
    });
    postAjax.fail(function (res) {
        console.log(res);
        var mes = '<div class="alert alert-success text-left">Post ajax has problem! Try again!</div>';
        $(target).closest('.modal-body').append(mes);
        $(element).closest('.modal-footer').find('button').removeAttr('disabled');
    });

}

function chooseImage(element) {
    var name = $(element).val().split(/(\\|\/)/g).pop();
    var title = $(element).closest('label').find('span.ace-file-name:first').attr('data-old-title');
    if (name == '') {
        name = title;
        if ($(element).closest('label').find('input.old-image').length > 0) {
            var oldImage = $(element).closest('label').find('input.old-image:first').attr('data-url');
            $(element).closest('tr').find('td div.img-preview').html('<img class="img img-responsive img-thumbnail" src="' + oldImage + '">');
        } else {
            $(element).closest('tr').find('td div.img-preview').html('');
        }
    }
    if (name != '') {
        readImage(element);
    }
    $(element).closest('.ace-file-input').find('span.ace-file-name').attr('data-title', name);
}
function readImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).closest('tr').find('td div.img-preview').html('<img class="img img-responsive img-thumbnail" src="' + e.target.result + '">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
