<script language="javascript" type="text/javascript">
var cart_product_nb = {$cart_product_nb};
var subscribe_cfm_msg = "{$subscribe_cfm_msg}";

$(document).ready(function () {
	$("#quantity_wanted_p").hide();
	$("#add_to_cart").hide();
	var url = "{$link->getModuleLink('agilepaypal','buymembership',[], true)}";
	$('form#buy_block').attr('action', url);
});

function confirm_subcribe()
{
	if(cart_product_nb > 0)
	{
		if(!confirm(subscribe_cfm_msg))return false;
	}

	$('form#buy_block').submit();
}
</script>

<div id="add_to_cart_replacement">
<p style="display:{if $am_show_choice == 0}none{else}{/if};">
{$recurring_base}&nbsp;{$recurring_cycle_displayname}&nbsp;{l s='Period' mod='agilepaypal'}, 
<input type="hidden" value="{$recurring_cycle}" name="sl_agilepaypalexpress_cycle" id="sl_agilepaypalexpress_cycle">
<input type="hidden" value="{$recurring_base}" name="sl_agilepaypalexpress_cycle_base" id="sl_agilepaypalexpress_cycle_base">
<select name="sl_agilepaypalexpress_cycle_num" id="sl_agilepaypalexpress_cycle_num">
	<option value="0">{l s='Until cancelled' mod='agilepaypal'}</option>
	<option value="1">1 {l s='Time only' mod='agilepaypal'}</option>
	{for $var=2 to 24}
		<option value="{$var}">{$var} {l s='Times' mod='agilepaypal'}</option>
	{/for}
</select>&nbsp;
</p>
<p class="buttons_bottom_block no-print">
  <button type="submit" name="Submit" class="agilesubscribe" onclick="confirm_subcribe()">
    <span>{$subscribe_membership_button}</span>
  </button>
</p>
</div>
