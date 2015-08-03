<div class="clr_hr"></div>
<div class="clr_20"></div>
<h3>{l s='Check System'  mod='facebookpsconnect'}</h3>
<div class="fbpscClearAdmin"></div>
<div class="form-horizontal">
	<div class="form-group">
		<div class="col-lg-5">
			<p class="alert alert-info">
				{l s="This section lets you verify that your store is properly configured and meets all necessary technical requirements to qualify for Facebook Ps Connect program and for the module to function properly."  mod='facebookpsconnect'}
			</p>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-5">
			{if !empty($sCheckCurlInit)}
				<p class="alert alert-danger">
					{l s='Facebook Ps Connect needs the CURL PHP extension, please install and / or activate the extension before continuing with the configuration' mod='facebookpsconnect'}
				</p>
				{else}
				<p class="alert alert-success">
					{l s='CURL PHP extension is enabled' mod='facebookpsconnect'}
				</p>
			{/if}
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-5">
			{if !empty($sCheckAllowUrl)}
				<p class="alert alert-danger" >
					{l s='Facebook Ps Connect needs the ALLOW_URL_FOPEN PHP directive if CURL is not installed, please activate the directive before continuing with the configuration' mod='facebookpsconnect'}
				</div>
			{else}
				<p class="alert alert-success" >
					{l s='ALLOW_URL_FOPEN is enabled' mod='facebookpsconnect'}
				</p>
			{/if}
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-5">
			{if !empty($sCheckGroup)}
				<p class="alert alert-success" >
					{l s='Default customer group is selected' mod='facebookpsconnect'}
				</p>
			{else}
				<p class="alert alert-danger" >
					{l s='The default customer group is not filled out, please choose your default group before continuing with the configuration' mod='facebookpsconnect'}
				</p>
			{/if}
		</div>
	</div>

	{if !empty($bOnePageCheckOut) && !empty($bTwitterActif)}
		<div class="form-group">
			<div class="col-lg-5">
				<div class="alert alert-danger">
					<p>{l s='If you have activated the "TWITTER CONNECTOR" and you are using the "ONE PAGE CHECK OUT" feature, then the TWITTER CONNECTOR doesn\'t get the right customer info. In this case, the customer will have to connect again via the TWITTER button on PRESTASHOP to fill out the information, regarding first name, last name.' mod='facebookpsconnect'}</p>
					<p>{l s='For better order management, we recommend not using TWITTER CONENCTOR and ONE PAGE CHECK OUT together.' mod='facebookpsconnect'}</p>
				</div>
			</div>
		</div>
	{/if}

	<h3>{l s='Test Curl with SSL' mod='facebookpsconnect'}</h3>
	<div class="fbpscClearAdmin"></div>

	<div class="form-group">
		<div class="col-lg-5">
			{if !empty($sCheckCurlInit)}
				<p class="alert alert-danger" >
					<h3>{l s='Before you can test, you need to have the Curl PHP extension installed and enabled !' mod='facebookpsconnect'}</h3>
				</p>
			{else}
				<div class="alert alert-info">
					{l s="The other social networks, such as Google, PayPal and Twitter use the OAuth system, and cURL over SSL MUST be enabled on your server. If you encounter connection problems to the social networks, you will need to contact your web host as the module needs cURL over SSL"  mod='facebookpsconnect'}
					<br/>
					<br/>
					<a class="btn btn-success" id="CurlSsl" href="{$sURI|escape:"html"}&sAction={$aQueryParams.curlssl.action|escape:"html"}&sType={$aQueryParams.curlssl.type|escape:"html"}">{l s='Click to check' mod='facebookpsconnect'}</a>
				</div>
			{literal}
			<script type="text/javascript">
			$(document).ready(function()
			{
				$("a#CurlSsl").fancybox({
				'hideOnContentClick' : false,
				'scrolling' : 'no',
				'autoDimensions' : true
			});
			});
			</script>
			{/literal}
			{/if}
		</div>
	</div>
</div>




