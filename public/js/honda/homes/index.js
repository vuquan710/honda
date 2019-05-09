$(document).ready(function () {
    console.log('index.js');
    $('.search tr').click(function () {
        var ele =  $(this);
        var name= ele.data('name');
        var name_checkout= ele.data('name_checkout');
        var product_code_fake = ele.data('product_code_fake');
        var price_agency1 = ele.data('price_agency1');
        var html = name + name_checkout + product_code_fake + price_agency1;
        $('.info').html(html);
        // console.log('abc',ele.html());
    })
});