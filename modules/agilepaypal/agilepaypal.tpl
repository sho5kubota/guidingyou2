<div class="row">
{if intval($recurringpayment)==0}
<div class="col-xs-12 col-md-6">
  <form action="{$agilepayoal_redirect_url}" method="post" id="expresscheckout_form" >
    <div class="payment_module {if $HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}box{/if}">
        <a class="agile_paypal {if $HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}inactiveLink{/if}" href="{if $HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}javascript:;{else}{$agilepayoal_redirect_url}{/if}" title="{l s='Pay with PayPal or Credit Cards' mod='agilepaypal'}" >
            {l s='Pay with PayPal or Credit Cards' mod='agilepaypal'}
        </a>
		  {$HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}
    </div>
  </form>
</div>
{else}
<script type="text/javascript" src="{$base_dir_ssl}modules/agilepaypal/common.js"></script>
<script type="text/javascript" src="{$base_dir_ssl}modules/agilepaypal/agilepaypal.js"></script>
<script language="javascript" type="text/javascript">
    var redirect_url = "{$agilepayoal_redirect_url}";
    var recurring_url = "{$agilepayoal_recurring_url}";
</script>
<div class="col-xs-12 col-md-6">
	<div class="payment_module">
		<div class="agile_paypal">
			<p>
				{l s='Pay with PayPal or Credit Cards' mod='agilepaypal'}
			</p>
			<form action="{$base_dir_ssl}{$atpage}" method="post" id="expresscheckout_form" class="std" >
        {if $HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}
        {$HOOK_SUBCARTP_PAYMENTINFO_AGILEPAYPAL}
        {else}
        <button type="button" name="go" id="go" class="button agile-btn agile-btn-default button-medium" onclick="agilePaypal_submitNormalCheckout()" >
						<span>{l s='Pay Now' mod='agilepaypal'}</span>
					</button>
        {/if}
        {include file="$agilepaypal_dir./payment-recurring.tpl"}
			</form>
       		{include file="$agilepaypal_dir./payment-hiddenform.tpl"}
		</div>
    </div>
</div>
{/if}
</div>