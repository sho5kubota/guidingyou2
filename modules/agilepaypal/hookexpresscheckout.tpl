<script type="text/javascript">
/** _agile_ <![CDATA[ _agile_ **/
    var baseDir = '{$base_dir_ssl}';
    var agilepaypal_cgvMsg = "{l s='Please accept the terms of service before the next step' mod='agilepaypal'}";
    var redirect_url = "{$agilepayoal_redirect_url}";
    var recurring_url = "{$agilepayoal_recurring_url}";
    var hideterms = {$hideterms};
/** _agile_ ]]> _agile_ **/
  $(document).ready(function() {
    $("a#service_term").fancybox({
    'type' : 'iframe',
    'width':600,
    'height':600
    });
  });

</script>

<script type="text/javascript" src="{$base_dir_ssl}modules/agilepaypal/common.js"></script>
<script type="text/javascript" src="{$base_dir_ssl}modules/agilepaypal/expresscheckout.js"></script>
<div class="express_checkout clearfix row">
<div class="col-xs-12 col-sm-6">
  <ul class="first_item item box"><li>
  <form style="padding:10px;" action="{$base_dir_ssl}{$atpage}" method="post" id="expresscheckout_form" class="std" >
    {if isset($back)}<input type="hidden" class="hidden" name="back" value="{$back|escape:'htmlall':'UTF-8'}" />{/if}
    <h3>
      <div class="row">
          <div>{l s='Paypal Express Checkout' mod='agilepaypal'}
          <span>
            <img src="{$base_dir_ssl}modules/agilepaypal/paypal_logo_small.jpg" />
            </span>
          </div>
      </div>
    </h3>
    <p class="text">
      {l s='Customer registration is not required, finish your order quickly and easily.' mod='agilepaypal'}<br /><br />
      {l s='Pay by Mastercard, Visa, American Express, or debit card through Paypal with no registration required.' mod='agilepaypal'}<br /><br />
      {l s='By choosing Express Checkout, you agree that we will ship your order to the address you specified at Paypal. Please select your location and carrier, and click Continue to proceed.' mod='agilepaypal'}<br />
    </p>
    <p class="checkbox" style="display:{if $hideterms}none{/if};">
      <input type="checkbox" name="agilepaypal_cgv" id="agilepaypal_cgv" value="1" />
      <label for="agilepaypal_cgv">{l s='I agree with the terms of service, and to adhere to them unconditionally.' mod='agilepaypal'}</label>
      <a id="service_term" href="{$link_conditions}" class="iframe">{l s='(read)' mod='agilepaypal'}</a>
    </p>

    <div id="agilePaypalExpressCheckoutForm">
		{$agilePaypalExpressCheckoutForm}
    </div>
  </form>
  {include file="$agilepaypal_dir./payment-hiddenform.tpl"}
  </li></ul>
</div>
</div>
<div class="clearfix"></div>
<br />