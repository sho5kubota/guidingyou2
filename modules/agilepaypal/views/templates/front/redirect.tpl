		<center>
		<table style="border:dotted 2px blue; width:300px;height:200px;"><tr><td nowrap valign="center" align="center">
		<img src="{$baseUrl}modules/agilepaypal/processing.gif" /><br /><br />
		{$redirect_text}<br /><br /><br />
		<a href="{$link->getPageLink('order', true, NULL, 'step=0')}">{$cancel_text}</a><br />
		</td></table>
		</center>
		{if !empty($error_msg)}
		<br><br>
		<h2>{l s='Some error occured' mod='agilepaypal'}</h2>
		<p style="color:red;">{$error_msg}</p>
		{/if}
		<form action="{$paypal_url}" method="post" id="paypal_form" class="hidden">
			<input type="hidden" name="upload" value="1" />
			<input type="hidden" name="address_override" value="{$address_override}" />
			<input type="hidden" name="first_name" value="{$address->firstname|escape:'htmlall':'UTF-8'}" />
			<input type="hidden" name="last_name" value="{$address->lastname|escape:'htmlall':'UTF-8'}" />
			<input type="hidden" name="address1" value="{$address->address1|escape:'htmlall':'UTF-8'}" />
			{if $address->address2 != NULL}
			<input type="hidden" name="address2" value="{$address->address2|escape:'htmlall':'UTF-8'}" />
			{/if}
			<input type="hidden" name="city" value="{$address->city|escape:'htmlall':'UTF-8'}" />
			<input type="hidden" name="zip" value="{$address->postcode}" />
			<input type="hidden" name="country" value="{$country->iso_code}" />
			{if $state != NULL}
			<input type="hidden" name="state" value="{$state->iso_code}" />
			{/if}
			<input type="hidden" name="amount" value="{Tools::ps_round($amount / $the_rate, 2)}" />
			<input type="hidden" name="email" value="{$customer->email}" />
			{if $show_discount==1}
			<input type="hidden" name="discount_amount_cart" value="{Tools::ps_round($discount / $the_rate, 2)}" />
			{foreach from=$products key=k item=product}
			<input type="hidden" name="item_name_{$k+1}" value="{$product.name|escape:'htmlall':'UTF-8'}{if isset($product.attributes)} - {$product.attributes|escape:'htmlall':'UTF-8'}{/if}" />
			<input type="hidden" name="item_number_{$k+1}" value="{$product.reference|escape:'htmlall':'UTF-8'}" />
			<input type="hidden" name="amount_{$k+1}" value="{Tools::ps_round($product.price_wt / $the_rate, 2)}" />
			<input type="hidden" name="quantity_{$k+1}" value="{$product.cart_quantity}" />
			{/foreach}
			<input type="hidden" name="handling_cart" value="{Tools::ps_round($shipping / $the_rate, 2)}" />
			{else}
			<input type="hidden" name="item_name_1" value="{$cart_text}" />
			<input type="hidden" name="amount_1" value="{Tools::ps_round($all_total / $the_rate, 2)}" />
			<input type="hidden" name="quantity_1" value="1" />
			{/if}
			<input type="hidden" name="business" value="{$business}" />
			<input type="hidden" name="receiver_email" value="{$business}" />
			<input type="hidden" name="cmd" value="_cart" />
			<input type="hidden" name="charset" value="utf-8" />
			<input type="hidden" name="currency_code" value="{$currency_module->iso_code}" />
			<input type="hidden" name="payer_id" value="{$customer->id}" />
			<input type="hidden" name="payer_email" value="{$customer->email}" />
			<input type="hidden" name="custom" value="{$cart_id}" />
			<input type="hidden" name="invoice" value="{$invoice}-{$cart_id}" />
			<input type="hidden" name="return" value="{$agilepaypal_return_url}?key={$customer->secure_key}&id_cart={$cart_id}&id_module={$paypal_id}&slowvalidation&expresscheckoutkey={$expresscheckoutkey}&id_subcart={$id_subcart}" />
			<input type="hidden" name="cancel_return" value="{$link->getPageLink('order', true, NULL, 'step=0')}" />
			<input type="hidden" name="notify_url" value="{$agile_url}modules/agilepaypal/validation.php" />
			{if $header != NULL}
			<input type="hidden" name="cpp_header_image" value="{$header}" />
			{/if}
			<input type="hidden" name="rm" value="2" />
			<input type="hidden" name="bn" value="PRESTASHOP_WPS" />
			<input type="hidden" name="cbt" value="{$return_text}" />
		</form>
		<script type="text/javascript">
		    var doSubmit = {$doSubmit};
		{literal}
		$(document).ready(function() {
		    if(doSubmit)$('#paypal_form').submit();
		});
		{/literal}
		</script>
