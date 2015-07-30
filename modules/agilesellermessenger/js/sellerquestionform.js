$(document).ready(function () {
    /** _agile_ set timer for fixxing Google map issues at multiple seller module - Sellr Info tab  _agile_  **/
    if (ispostbacksellerquestion) window.setTimeout("gosellerquestiontab()", 1000);

    $('div#idTab12 div[id=pagination] a').click(function () {
        var url = $(this).attr("href");
        var p = getQuerystringParam(url, "p", "");
        if (p == "") p = 1;
        newurl = creatSellerQustionUrl(p, request_sellerquestion_n);
        /** _agile_ alert("Click2:" + newurl); _agile_  **/
        window.location.href = newurl;
        return false;
    });

    /** _agile_ hook page size form submit event (override existing one) _agile_  **/
    $('div#idTab12 div[id=pagination] form').submit(function () {
        var n = $('select#nb_item').val();
        url = creatSellerQustionUrl(1, n);
        window.location.href = url;
        return false;
    });

});


function gosellerquestiontab() {
    $("#more_info_block ul").idTabs("idTab12");
}

function creatSellerQustionUrl(p, n) {
    return request_sellerquestion_uri + '&p=' + p + '&n=' + n + '&ispostbacksellerquestion=1';
}
