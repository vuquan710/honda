$(document).ready(function () {
    //Insert CSRF-TOKEN
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: function () {
            
        }
    });
    //Change limit
    $('select.change-limit').on('change', function () {
        var val = $(this).find('option:selected').attr('data-link');
        window.location.href = val;
    });
    //Change sort
    $('select.change-sort').on('change', function () {
        var val = $(this).find('option:selected').attr('value');
        window.location.href = val;
    });

    $('.select2').select2();
});