function agilePaypalToggleRecurringOpions() {
    if ($('select#agilepaypalexpress_cycle').val() == "") {
        $('span#span_agilepaypalexpress_cycle_num').hide();
    }
    else {
        $('span#span_agilepaypalexpress_cycle_num').show();
    }
}
