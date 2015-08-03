/** _agile_ normal payment submit _agile_  **/
function agilePaypal_submitNormalCheckout() {
    $('input#sl_agilepaypalexpress_cycle').val($('select#agilepaypalexpress_cycle').val());
    $('input#sl_agilepaypalexpress_cycle_num').val($('select#agilepaypalexpress_cycle_num').val());

    /** _agile_     alert($('input#sl_agilepaypalexpress_cycle_num').val()); _agile_  **/
    sl_cycle = $('select#agilepaypalexpress_cycle').val();
    $('form#expresscheckout_hidden_form').attr('action', (sl_cycle == '' ? redirect_url : recurring_url));
    $('form#expresscheckout_hidden_form').submit();
}
