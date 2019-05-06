
$(document).ready(function(){


	/* ---- Countdown timer ---- */

	// $('#counter').countdown({
	// 	timestamp : (new Date()).getTime() + 11*24*60*60*1000
	// });


	/* ---- Animations ---- */

	// $('#links a').hover(
	// 	function(){ $(this).animate({ left: 3 }, 'fast'); },
	// 	function(){ $(this).animate({ left: 0 }, 'fast'); }
	// );

	$('footer a').hover(
		function(){ $(this).animate({ top: 3 }, 'fast'); },
		function(){ $(this).animate({ top: 0 }, 'fast'); }
	);


});

$(window).load(function () {
    $("#brand-slider").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
                visibleItems: 1
            },
            landscape: {
                changePoint: 640,
                visibleItems: 2
            },
            tablet: {
                changePoint: 768,
                visibleItems: 3
            }
        }
    });

});
