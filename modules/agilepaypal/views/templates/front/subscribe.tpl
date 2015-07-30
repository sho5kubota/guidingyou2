		<center>
		<table style="border:dotted 2px blue; width:300px;height:200px;"><tr><td nowrap valign="center" align="center">
		<img src="{$baseUrl}modules/agilepaypal/processing.gif" /><br /><br />
		{$redirect_text}<br /><br /><br />
		<a href="{$link->getPageLink('order', true, NULL, 'step=0')}">{$cancel_text}</a><br />
		</td></table>
		</center>
		<form action="{$paypal_url}" method="post" id="paypal_form" class="hidden">
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

			<input type="hidden" name="business" value="{$business}">  
			<!-- Specify a Subscribe button. -->  
			<input type="hidden" name="cmd" value="_xclick-subscriptions">  
			<!-- Identify the subscription. -->  
			<input type="hidden" name="item_name" value="{$cart_text}-{$product1st.name}">  
			<input type="hidden" name="item_number" value="{$cart_id}-{$product1st.reference}">  
			<!-- Set the terms of the regular subscription. -->  
			<input type="hidden" name="currency_code" value="{$currency_module->iso_code}">  
			<input type="hidden" name="a3" value="{Tools::ps_round($all_total / $the_rate, 2)}">  
			<input type="hidden" name="p3" value="{$cycle_base}">  <!-- based on on membership type if it is integrated, otherwise always 1 -->  
			<input type="hidden" name="t3" value="{$cycle}">  
			<input type="hidden" name="src" value="1">  <!-- 1 recurrs, 0 not recurrs -->  
			<input type="hidden" name="srt" value="{$cycle_num}"> <!-- total cycles to recurrs >1 -->
			<input type="hidden" name="sra" value="1">  <!-- 1 ?reattempt failed recurring payments before canceling -->
			<!-- Display the payment button. -->  

			<input type="hidden" name="custom" value="{$cart_id}" />
			<input type="hidden" name="invoice" value="{$invoice}-{$cart_id}" />
			<input type="hidden" name="return" value="{$agilepaypal_return_url}?key={$customer->secure_key}&id_cart={$cart_id}&id_module={$paypal_id}&slowvalidation&expresscheckoutkey={$expresscheckoutkey}" />
			<input type="hidden" name="cancel_return" value="{$link->getPageLink('order', true, NULL, 'step=0')}" />
			<input type="hidden" name="notify_url" value="{$agile_url}modules/agilepaypal/validation.php" />
			{if $header != NULL}
			<input type="hidden" name="cpp_header_image" value="{$header}" />
			{/if}
			<input type="hidden" name="rm" value="2" /><!-- the payer’s browser is redirected to the return URL by the POST method, -->
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
