$(document).ready(function () {
    $('.search tr').click(function () {
        var ele = $(this);
        var name = ele.data('name');
        var name_checkout = ele.data('name_checkout');
        var product_code_fake = ele.data('product_code_fake');
        var price_agency1 = ele.data('price_agency1');

        $('#name').html(name);
        $('#name_checkout').html(name_checkout);
        $('#product_code_fake').html(product_code_fake);
        $('#price_agency1').html(price_agency1);
        $('#submit').attr('data-name', name).attr('data-name_checkout', name_checkout).attr('data-product_code_fake', product_code_fake).attr('data-price_agency1', price_agency1);
        // console.log('abc',ele.html());
    });

    $('#submit').click(function () {
        var ele = $(this);
        console.log('ele',ele.data());
        var name = ele.data('name');
        var name_checkout = ele.data('name_checkout');
        var product_code_fake = ele.data('product_code_fake');
        var price_agency1 = ele.data('price_agency1');
        var html = "<tr>" +
            "<td></td>" +
            "<td>" + name + "</td>" +
            "<td>" + name_checkout + "</td>" +
            "<td>" + product_code_fake + "</td>" +
            "<td>" + price_agency1 + "</td>" +
            "<td>" + 1 + "</td>" +
            "</tr>";
        $('.bill > tbody tr:first-child').before(html)
    })
});