/** _agile_
$(document).ready(function () {
    agilePaypal_getForm();
});
 _agile_  **/

function agilePaypal_getForm() {
    var url = baseDir + 'modules/agilepaypal/expresscheckout.php';
    var data = 'expresscheckout_id_country=' + $('select#expresscheckout_id_country').val() + '&expresscheckout_id_state=' + $('select#expresscheckout_id_state').val() + '&expresscheckout_id_carrier=' + $('select#expresscheckout_id_carrier').val();

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (msg) {
            $('#agilePaypalExpressCheckoutForm').html(msg);
            /** _agile_  agilePaypal_updateCartSummary();  _agile_  **/
            window.location.reload(true);
        }
    });
}

/** _agile_ 
function agilePaypal_updateCartSummary() {
    $.ajax({
        type: 'POST',
        headers: { "cache-control": "no-cache" },
        url: baseUri + '?rand=' + new Date().getTime(),
        async: true,
        cache: false,
        dataType: "json",
        data: 'controller=cart&ajax=true&token=' + static_token,
        success: function (jsonData) {
            ajaxCart.updateCart(jsonData);
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }

    });
}
 _agile_  **/

function agilePaypal_submitExpressCheckout(msg) {
    if (!hideterms && !agilepaypal_acceptCGV(msg)) return;
    $('input#sl_expresscheckout_id_country').val($('select#expresscheckout_id_country').val());
    $('input#sl_agilepaypalexpress_cycle').val($('select#agilepaypalexpress_cycle').val());
    $('input#sl_agilepaypalexpress_cycle_num').val($('select#agilepaypalexpress_cycle_num').val());
    /** _agile_     alert($('input#sl_agilepaypalexpress_cycle_num').val()); _agile_  **/
    sl_cycle = $('select#agilepaypalexpress_cycle').val();
    $('form#expresscheckout_hidden_form').attr('action', (sl_cycle == '' ? redirect_url : recurring_url));
    $('form#expresscheckout_hidden_form').submit();
}

function agilepaypal_acceptCGV(msg) {
    if ($('#agilepaypal_cgv').length && !$('input#agilepaypal_cgv:checked').length) {
        alert(msg);
        return false;
    }
    else
        return true;
}
