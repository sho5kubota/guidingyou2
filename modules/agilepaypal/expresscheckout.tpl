    <div class="required expresscheckout_id_country select" style="display:{if $hidecountry == 1}none{/if}">
    <label for="expresscheckout_id_country" >{l s='Country: ' mod='agilepaypal'}</label>
    <select name="expresscheckout_id_country" id="expresscheckout_id_country" onchange="agilePaypal_getForm();">
	    <option value="">-</option>
	    {foreach from=$countries item=v}
	    <option value="{$v.id_country}" {if ($sl_country == $v.id_country)} selected="selected"{/if}>{$v.name|escape:'htmlall':'UTF-8'}</option>
	    {/foreach}
    </select>
    </div> 
    <div class="required expresscheckout_id_state select" style="display:{if $hidestates == 1}none{/if}">
        <label for="expresscheckout_id_state">{l s='State: ' mod='agilepaypal'}</label>
        <select name="expresscheckout_id_state" id="expresscheckout_id_state"  onchange="agilePaypal_getForm();">
	        <option value="">-</option>
	        {if $hasStates}
			{foreach from=$states item=v}
			<option value="{$v.id_state}" {if ($sl_state == $v.id_state)} selected="selected"{/if}>{$v.name|escape:'htmlall':'UTF-8'}</option>
			{/foreach}
			{/if}
        </select>
    </div>
    <div class="required expresscheckout_id_carrier select" style=" display:{if $hidecarrier == 1}none{/if}">
        <label for="expresscheckout_id_carrier">{l s='Carrier: ' mod='agilepaypal'}</label>
	    <select name="expresscheckout_id_carrier" id="expresscheckout_id_carrier"  onchange="agilePaypal_getForm();">
			{foreach from=$carriers item=v}
			<option value="{$v.id_carrier}" {if ($sl_carrier == $v.id_carrier)} selected="selected"{/if}>{$v.name|escape:'htmlall':'UTF-8'}</option>
			{/foreach}
	    </select>
    </div> 

   	{include file="$agilepaypal_dir./payment-recurring.tpl"}


    <p>
       <input type="button" name="btn1" id="btn1" value="{l s='Express Checkout' mod='agilepaypal'}" class="exclusive" onclick="agilePaypal_submitExpressCheckout(agilepaypal_cgvMsg)" />
    </p>    
