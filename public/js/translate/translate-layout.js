$( document ).ready(function() {
    $('a.li-vnxk').text( $.i18n._('VNXK') );
	 $('a.home').text( $.i18n._('Home') );
	  $('a.li--contact').text( $.i18n._('Contact') );
	   $('a.li-about').text( $.i18n._('AboutUS') );
	    $('a.li-product-image').text( $.i18n._('Gallery') );
		 $('a.li-adl').text( $.i18n._('ADL') );
		  $('a.li-aityc').text( $.i18n._('SIR') );
		    $('#delivery').text( $.i18n._('Delivery') );
			  $('#ProductReturn').text( $.i18n._('ProductReturn') );
			   $('#deliverys-msg').text( $.i18n._('deliveryMsg') );
			     $('#ProductReturnMsg').html( $.i18n._('ProductReturnMsg') );
				  $('#address-footer').html( $.i18n._('hotline') );
				  var readmore=$('.readmore');
				   if (typeof readmore !== "undefined" || readmore !== null)
				   $('.readmore').html( $.i18n._('readmore') );
			      $('.web-brand').text( $.i18n._('web-brand') );
});