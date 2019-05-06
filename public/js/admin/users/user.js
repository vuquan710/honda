$(document).ready(function () {
    //Load recent order

});

function loadRecentOrder(element) {
    var tagetRessult = $(element).attr('target-element');
    var url = $(element).attr('target-link');
    var data = {"1": "222"};
    var postData = $.post(url, data);
    postData.done(function (result) {
        console.log(result);
    });
}