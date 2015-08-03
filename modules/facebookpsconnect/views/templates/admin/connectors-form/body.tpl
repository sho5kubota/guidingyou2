
<h3 class="popup_title">{$aConnector.title|upper} {l s='CONFIGURATION' mod='facebookpsconnect'}</h3>
<div class="bootstrap">
	{if $iTestCurlSsl != 2}
		{if $iConnectorId == 'facebook' && $iTestCurlSsl == 0 && $iApiRequestMethod == ''}
			<div class="alert alert-danger" id="{$sModuleName|escape:"html"}ConnectorError">
				{l s='Facebook needs to have a connection method selected. Please select a connection method in the "Basics" tab.' mod='facebookpsconnect'}
			</div>
		{elseif $iConnectorId == 'facebook' && $iTestCurlSsl == 0 && ( $iApiRequestMethod == ''  || $iApiRequestMethod == 'curl')}
			<div class="alert alert-danger" id="{$sModuleName|escape:"html"}ConnectorError">
				{l s='You have selected the "PHP CURL LIBRARY" connection method, but have not yet completed the cURL test. Please run the cURL test in the "Prerequisites Check" tab.' mod='facebookpsconnect'}
			</div>
		{elseif $iConnectorId != 'facebook' && $iTestCurlSsl == 0}
			<div class="alert alert-danger" id="{$sModuleName|escape:"html"}ConnectorError">
				{l s='You need check your cURL over SSL configuration. Please run the cURL test in the "Prerequisites Check" tab.' mod='facebookpsconnect'}
			</div>
		{elseif $iTestCurlSsl == 1}
			<div class="alert alert-danger" id="{$sModuleName|escape:"html"}ConnectorError">
				{l s=' The cURL over SSL test failed, you will need to contact your webhost, as the module needs cURL over SSL enabled.' mod='facebookpsconnect'}
			</div>
		{/if}
	{/if}
	<form action="{$sURI}" method="post" id="{$sModuleName|escape:"html"}ConnectorForm" name="{$sModuleName|escape:"html"}ConnectorForm" onsubmit="{$sModuleName|escape:"html"}.form('{$sModuleName|escape:"html"}ConnectorForm', '{$sURI}', '', '{$sModuleName|escape:"html"}ConnectorList', '{$sModuleName|escape:"html"}ConnectorList', false, true, null, 'Connector');return false;">
		<input type="hidden" name="sAction" value="{$aQueryParams.connector.action|escape:"html"}" />
		<input type="hidden" name="sType" value="{$aQueryParams.connector.type|escape:"html"}" />
		<input type="hidden" name="iConnectorId" value="{$iConnectorId|escape:"html"}" />
		<div class="plugin_form">
			{include file="`$sTplToInclude`"}
		</div>
		<br/>
		<center>
			<span><input class="button btn btn-success" type="button" id="{$sModuleName|escape:"html"}ConfigureConnector" name="{$sModuleName|escape:"html"}ConfigureConnector" value="{l s='Update' mod='facebookpsconnect'}" onclick="{$sModuleName|escape:"html"}.form('{$sModuleName|escape:"html"}ConnectorForm', '{$sURI}', '', '{$sModuleName|escape:"html"}ConnectorList', '{$sModuleName|escape:"html"}ConnectorList', false, true, null, 'Connector');return false;" /></span>
		</center>
		<br/>
	</form>

</div>













