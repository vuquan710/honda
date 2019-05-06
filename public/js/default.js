$(document).ready(function () {
    $('#myNavbar ul.navbar-nav li').each(function () {
        $(this).click(function () {
            $('#myNavbar ul.navbar-nav li.active').removeClass('active');
            $(this).addClass('active');
        });
    });
    $('#myNavbar1 ul.navbar-nav li').each(function () {
        $(this).click(function () {
            $('#myNavbar1 ul.navbar-nav li.active').removeClass('active');
            $(this).addClass('active');
        });
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
	$.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: function () {
            
        }
    });
    //Change limit
    $('select.change-limit').on('change', function () {
        var val = $(this).find('option:selected').attr('data-link');
        window.location.href = val;
    })
});