
<div class="bootstrap" xmlns="http://www.w3.org/1999/html">
	<div id="{$sModuleName|escape:"html"}ConfigureHook">
		<h3>{l s='The result of your test' mod='facebookpsconnect'}</h3>
		{if $iCurlSslCheck == false}
			<p class='alert alert-danger'>
				{l s='CURL with SSL is disable'  mod='facebookpsconnect'}
			</p>
		{else}
			<p class='alert alert-success'>
				{l s='CURL with SSL is enable'  mod='facebookpsconnect'}
			</p>
		{/if}
		<center><div class="btn btn-info" style="text-align: center;"><a class="btn-info" href="#" onclick="jQuery144.fancybox.close();location.reload();">{l s='Close'  mod='facebookpsconnect'}</a></div></center>
	</div>
</div>

