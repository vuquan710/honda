$(document).ready(function () {
    $('#add-more-image').click(function () {
        var length = $('#table-list-image tbody').find('tr').length;
        if (length >= 5) {
            return;
        }
        var index = $('#table-list-image tbody').find('tr:last').attr('index') || -1;
        index++;
        var newHtmlImage =
            '<tr index="' + index + '">' +
            '   <td></td>' +
            '   <td>' +
            '       <label><input type="checkbox" class="ace" checked="checked" name="images[' + index + '][is_show]" value="1"/><span class="lbl"></span></label>' +
            '   </td>' +
            '   <td class="text-center">' +
            '       <label class="">' +
            '           <input name="image_main" type="radio" class="ace" value="' + index + '"><span class="lbl"></span>' +
            '       </label>' +
            '   </td>' +
            '   <td>' +
            '       <div class="text-left">' +
            '           <label class="ace-file-input">' +
            '               <input type="file" name="images[' + index + '][image]" onchange="chooseImage(this)" accept="image/x-png,image/gif,image/jpeg">' +
            '               <span class="ace-file-container" data-title="' + $.i18n._('Choose') + '">' +
            '                   <span class="ace-file-name" data-title="' + $.i18n._('No_file_choose') + '..." data-old-title="' + $.i18n._('No_file_choose') + '..."><i class=" ace-icon fa fa-upload"></i></span>' +
            '               </span>' +
            '           </label>' +
            '       </div>' +
            '   </td>' +
            '   <td><input class="form-control input-sm" name="images[' + index + '][description]"/></td>' +
            '   <td><div class="img-preview"></div></td>' +
            '   <td><button type="button" class="btn btn-xs btn-danger" onclick="deleteThisRow(this)"><i class="fa fa-trash"></i></button></td>' +
            '</tr>';
        $('#table-list-image tbody').append(newHtmlImage);
        reIndexTable('#table-list-image');
    });
    $('#add-more-option').click(function () {
        let maxOption = $(this).attr('max-option');
        var length = $('#table-list-option tbody').find('tr').length;
        if (length >= 5) {
            return;
        }
        var index = $('#table-list-option tbody').find('tr:last').attr('index') || -1;
        index++;
        var option = '<option value="">- Select -</option>';
        $.each(displayType, function (key, value) {
            option += '<option value="' + key + '">' + value + '</option>'
        })
        var newHtml =
            '<tr index="' + index + '">' +
            '   <td>1</td>' +
            '   <td><input type="text" name="options[' + index + '][display_name]" value="" class="form-control"/></td>' +
            '   <td>' +
            '       <select class="select2" index="' + index + '" name="options[' + index + '][display_type]" style="width: 100%" onchange="changeOption(this)" max-option="' + maxOption + '">' +
            option +
            '       </select>' +
            '   </td>' +
            '   <td class="value-option"></td>' +
            '   <td class="text-center">' +
            '       <button type="button" class="btn btn-xs btn-danger" onclick="deleteThisRow(this)"><i class="fa fa-trash"></i></button>' +
            '   </td>' +
            '</tr>';
        $('#table-list-option tbody').append(newHtml);
        reIndexTable('#table-list-option');
        $('.select2').select2();
    })

    $("#product_code").on('change', function(){
      $("#product_code_fake").val(btoa($(this).val()));
    });


});

function reIndexTable(table) {
    var index = 1;
    $(table + ' tbody').find('tr').each(function () {
        $(this).find('td:first').text(index++);
    })

}

function deleteThisRow(element) {
    var id = $(element).closest('table').attr('id');
    $(element).closest('tr').remove();
    reIndexTable('#' + id);
}

function changeOption(element) {
    let type = $(element).val();
    let maxOption = $(element).attr('max-option');
    let index = $(element).closest('tr').attr('index');
    let htmlData = '';
    let typeOptions = [1, 2, 3,4];
    for (let i = 0; i < maxOption; i++) {
        if (typeOptions.indexOf(parseInt(type)) >= 0) {
            htmlData += '<div class="form-group"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Value ' + (i + 1) + '<span class="red">&nbsp;(*)</span>:&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][val]" class="form-control input-sm"/></div></div></div>' +
                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Label ' + (i + 1) + ':&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][label]" class="form-control input-sm"/></div></div></div></div>';
        }
        // if (type == 2) {
        //     htmlData += '<div class="form-group"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Value ' + (i + 1) + '<span class="red">&nbsp;(*)</span>:&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][val]" class="form-control input-sm"/></div></div></div>' +
        //         '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Label ' + (i + 1) + ':&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][label]" class="form-control input-sm"/></div></div></div></div>';
        // }
        // if (type == 3) {
        //     htmlData += '<div class="form-group"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Value ' + (i + 1) + '<span class="red">&nbsp;(*)</span>:&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][val]" class="form-control input-sm"/></div></div></div>' +
        //         '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="row"><label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">Label ' + (i + 1) + ':&nbsp;</label><div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><input type="text" name="options[' + index + '][value][' + i + '][label]" class="form-control input-sm"/></div></div></div></div>';
        // }
    }
    $(element).closest('tr').find('td.value-option:first').html(htmlData);
}
