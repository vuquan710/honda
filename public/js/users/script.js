$(document).ready(function () {
    carousels();
    animations();
    zoomImage();

    $('.list-img-product .list-img').click(function () {
        let url = $(this).data('url');
        $(this).closest('.box-image-product').find('.img-main').attr('src', url);
        zoomImage();
    });
    $('.form-contact').on('submit', function (e) {
        e.preventDefault();
        let $this = $(this);
        let url = $this.attr('action');
        let data = $this.serialize();
        var postAjax = $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                $this.find('button[type="submit"]').attr('disabled', 'disabled');
            }
        });

        postAjax.done(function (res) {
            console.log(res);
            $this[0].reset();
            $this.find('button[type="submit"]').removeAttr('disabled');
        });
        postAjax.fail(function (res) {
            $this.find('button[type="submit"]').removeAttr('disabled');
        })
    });
	var fbPage=$('#fbPage');
	if(typeof fbPage !== 'undefined' && fbPage!=null){
		var fb='<div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                      '   <div class="fb-page"  data-href="https://www.facebook.com/aodongluc.vn" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div> '+
                       ' </div>'+
                  '    <div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                       '      <div class="fb-page"  data-href="https://www.facebook.com/ADLShops/" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div>  '+

                     '   </div>'+
                    '  <div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                       '      <div class="fb-page"  data-href="https://www.facebook.com/mayintheutheoyeucau/" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div> '+
                      '  </div>'+
						'<div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                       '    <div class="fb-page"  data-href="https://www.facebook.com/xuonginaothundep/" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div> '+
                      '  </div>'+
                      ' <div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                           
 ' <div class="fb-page"  data-href="https://www.facebook.com/aovnxk.vn/" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div> '+
                    '    </div>'+
                    '  <div class="col-md-4 col-sm-6" style="margin-top:10px;">'+
                      '       <div class="fb-page"  data-href="https://www.facebook.com/dongphucinmaytheoyeucau/" data-width="220" data-height="400"  data-hide-cover="false" data-show-facepile="true" ></div> '+
                      '  </div>';
					   fbPage.append(fb);
	}
});

function searchProduct(){
	$('#search-exec').click();
}
/* animations */

function animations() {
    var delayTime = 0;
    $('[data-animate]').css({opacity: '0'});
    $('[data-animate]').waypoint(function (direction) {
            delayTime += 150;
            $(this).delay(delayTime).queue(function (next) {
                $(this).toggleClass('animated');
                $(this).toggleClass($(this).data('animate'));
                delayTime = 0;
                next();
                //$(this).removeClass('animated');
                //$(this).toggleClass($(this).data('animate'));
            });
        },
        {
            offset: '90%',
            triggerOnce: true
        });

    $('[data-animate-hover]').hover(function () {
        $(this).css({opacity: 1});
        $(this).addClass('animated');
        $(this).removeClass($(this).data('animate'));
        $(this).addClass($(this).data('animate-hover'));
    }, function () {
        $(this).removeClass('animated');
        $(this).removeClass($(this).data('animate-hover'));
    });

}

function carousels() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        // navText:["&laquo;", "&raquo;"],
        loop: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
            }
        }
    })
}

function zoomImage() {
    $(".zoom_image").elevateZoom({
        zoomType: 'lens',
        lensShape: 'round',
        containLensZoom: true
    });
}