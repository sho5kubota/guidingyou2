	{if !empty($bUpdate)}
		{include file="`$sConfirmInclude`"}
	{elseif !empty($aErrors)}
		{include file="`$sErrorInclude`"}
	{/if}


	<div class="bootstrap" xmlns="http://www.w3.org/1999/html">
		<form action="{$sURI}" class="form-horizontal" method="post" id="{$sModuleName}BasicForm" name="{$sModuleName}BasicForm" {if $smarty.const._FPC_USE_JS == true}onsubmit="{$sModuleName}.form('{$sModuleName}BasicForm', '{$sURI}', null, '{$sModuleName}BasicSettings', '{$sModuleName}BasicSettings', null, false, null, 'Basic');return false;"{/if}>
			<input type="hidden" name="sAction" value="{$aQueryParams.basic.action|escape:"html"}" />
			<input type="hidden" name="sType" value="{$aQueryParams.basic.type|escape:"html"}" />
			<h3>{l s='Facebook PS Connect Basics Settings' mod='facebookpsconnect'}</h3>
			<div class="fbpscClearAdmin"></div>
			<div class="form-group" id="bootstrap-bouton">
				<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='If this option is enabled, then when one of your existing customers will next log in via the regular login form, we will offer them to associate their PrestaShop and Facebook account.' mod='facebookpsconnect'}"><b>{l s='Propose PrestaShop / Facebook account association on standard login?' mod='facebookpsconnect'}</b></span> :</label>
				<div {if $bVerion15_16}class=""{else}class="col-lg-2"{/if}>
					<span class="switch prestashop-switch fixed-width-md">
						<input type="radio" name="{$sModuleName}DisplayFbPopin" id="{$sModuleName}DisplayFbPopin_on" value="true" {if !empty($bDisplayAskFacebook)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayFbPopin_on" class="radioCheck">
							{l s='Yes' mod='facebookpsconnect'}
						</label>
						<input type="radio" name="{$sModuleName|escape:"html"}DisplayFbPopin" id="{$sModuleName|escape:"html"}DisplayFbPopin_off" value="false" {if empty($bDisplayAskFacebook)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayFbPopin_off" class="radioCheck">
							{l s='No' mod='facebookpsconnect'}
						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
				<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='If this option is enabled, then when one of your existing customers will next log in via the regular login form, we will offer them to associate their PrestaShop and Facebook account.' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='This will display a login block with the standard e-mail / password fields in the right and / or left column of your website, and will also add the social network login buttons. However, you need to then associate the proper login buttons to either the Right Column or Left Column in the "Hooks" tab of this module configuration.' mod='facebookpsconnect'}"><b>{l s='Display customer login block?' mod='facebookpsconnect'}</b></span> :</label>
				<div {if $bVerion15_16}class=""{else}class="col-lg-2"{/if}>
					<span class="switch prestashop-switch fixed-width-md">
						<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlock" id="{$sModuleName|escape:"html"}DisplayBlock_on" value="true" {if !empty($bDisplayBlock)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayBlock_on" class="radioCheck">
							{l s='Yes' mod='facebookpsconnect'}
						</label>
						<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlock" id="{$sModuleName|escape:"html"}DisplayBlock_off" value="false" {if empty($bDisplayBlock)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayBlock_off" class="radioCheck">
							{l s='No' mod='facebookpsconnect'}
						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
				<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='This will display a login block with the standard e-mail / password fields in the right and / or left column of your website, and will also add the social network login buttons. However, you need to then associate the proper login buttons to either the Right Column or Left Column in the "Hooks" tab of this module configuration.' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='This will use the default group once each customer is creating his own account through a social connector' mod='facebookpsconnect'}"><b>{l s='Select your default customer group' mod='facebookpsconnect'}</b></span> :</label>
				<div class="col-xs-2">
					<select id="{$sModuleName|escape:"html"}DefaultGroup" name="{$sModuleName|escape:"html"}DefaultGroup">
						{foreach from=$aGroups name=group key=key item=aGroup}
							<option value="{$aGroup.id_group}" {if $aGroup.id_group == $iDefaultCustomerGroup}selected="selected"{/if}>{$aGroup.name}</option>
						{/foreach}
					</select>
				</div>
				<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='This will use the default group once each customer is creating his own account through a social connector' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='Do not forget when you\'ve got this kind of error : "an internal server error " or "token is empty" or "state doesn\'t match", this is may come from your connect method that is not allowed with HTTPS protocol' mod='facebookpsconnect'}"><b>{l s='Select your connect method to Facebook' mod='facebookpsconnect'}</b></span> :</label>
				<div class="col-xs-2">
					<select id="{$sModuleName|escape:"html"}ApiRequestType" name="{$sModuleName|escape:"html"}ApiRequestType">
						<option value="">...</option>
						{foreach from=$aApiCallMethod name=group key=key item=aMethod}
							<option value="{$aMethod.type}" {if $aMethod.type == $sApiRequestType}selected="selected"{/if} {if empty($aMethod.active)}disabled="disabled"{/if}>{$aMethod.name}{if empty($aMethod.active)} - {l s='not activated on your server' mod='facebookpsconnect'}{/if}</option>
						{/foreach}
					</select>
				</div>
				<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='Do not forget when you\'ve got this kind of error : "an internal server error " or "token is empty" or "state doesn\'t match", this is may come from your connect method that is not allowed with HTTPS protocol' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3"></label>
				<div class="col-lg-6">
					<div class="{if $iCompare == -1}{$sModuleName|escape:"html"}Hint{else}alert alert-info{/if} clear" style="display: block !important;">
						{l s='The others social networks as Google, PayPal and Twitter use OAuth system, cURL over SSL must be enabled on your server. If you encounter connection problems to the social networks, you will need to contact your webhost as the module needs cURL over SSL'  mod='facebookpsconnect'}.
					</div>
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='Active to show/hide the block in the page' mod='facebookpsconnect'}"><b>{l s='Show information block on the account page ?' mod='facebookpsconnect'}</b></span> :</label>
				<div {if $bVerion15_16}class=""{else}class="col-lg-2"{/if}>
					<span class="switch prestashop-switch fixed-width-md">
						<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlockInfoAccount" id="{$sModuleName|escape:"html"}DisplayBlockInfoAccount_on" value="true" {if !empty($bDisplayBlockInfoAccount)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayBlockInfoAccount_on" class="radioCheck">
							{l s='Yes' mod='facebookpsconnect'}
						</label>
						<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlockInfoAccount" id="{$sModuleName|escape:"html"}DisplayBlockInfoAccount_off" value="false" {if empty($bDisplayBlockInfoAccount)}checked="checked"{/if} />
						<label for="{$sModuleName|escape:"html"}DisplayBlockInfoAccount_off" class="radioCheck">
							{l s='No' mod='facebookpsconnect'}
						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
				&nbsp;
				<a href="#" data-toggle="modal" data-target="#modal_account_preview"><span class="icon-eye-open">&nbsp;{l s='Click here to show a preview after changing and updating this setting' mod='facebookpsconnect'}</span></a>
				<!-- Modal -->
				<div class="modal fade" id="modal_account_preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">{l s='Preview' mod='facebookpsconnect'}</h4>
							</div>
							<div class="modal-body">
								<img src="{$smarty.const._FPC_URL_IMG_ADMIN}/{$bDisplayBlockInfoAccount|escape:"html"}-sc_fpsc_block_account.png"">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">{l s='Close' mod='facebookpsconnect'}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{if !empty($bOnePageCheckOut)}
				<div class="form-group">
					<label class="control-label col-lg-3"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='Active to show/hide the block in the page' mod='facebookpsconnect'}"><b>{l s='Show information block on the One Page Check Out Page ?' mod='facebookpsconnect'}</b></span> :</label>
					<div {if $bVerion15_16}class=""{else}class="col-lg-2"{/if}>
						<span class="switch prestashop-switch fixed-width-md">
							<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlockInfoCart" id="{$sModuleName|escape:"html"}DisplayBlockInfoCart_on" value="true" {if !empty($bDisplayBlockInfoCart)}checked="checked"{/if} />
							<label for="{$sModuleName|escape:"html"}DisplayBlockInfoCart_on" class="radioCheck">
								{l s='Yes' mod='facebookpsconnect'}
							</label>
							<input type="radio" name="{$sModuleName|escape:"html"}DisplayBlockInfoCart" id="{$sModuleName|escape:"html"}DisplayBlockInfoCart_off" value="false" {if empty($bDisplayBlockInfoCart)}checked="checked"{/if} />
							<label for="{$sModuleName|escape:"html"}DisplayBlockInfoCart_off" class="radioCheck">
								{l s='No' mod='facebookpsconnect'}
							</label>
							<a class="slide-button btn"></a>
						</span>
					</div>
					&nbsp;
					<!-- Button trigger modal -->
					<a href="#" data-toggle="modal" data-target="#modal_opc_preview"><span class="icon-eye-open">&nbsp;{l s='Click here to show a preview after changing and updating this setting' mod='facebookpsconnect'}</span></a>
					<!-- Modal -->
					<div class="modal fade" id="modal_opc_preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content modal-lg">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">{l s='Preview' mod='facebookpsconnect'}</h4>
								</div>
								<div class="modal-body ">
									<img src="{$smarty.const._FPC_URL_IMG_ADMIN}/{$bDisplayBlockInfoCart|escape:"html"}-sc_fpsc_block_cart.png">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">{l s='Close' mod='facebookpsconnect'}</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			{/if}
			<div class="form-group"></div>
			<div class="form-group">
				<label class="control-label col-lg-5"></label>
				<div class="col-xs-2">
					{if $smarty.const._FPC_USE_JS == true}
						<input type="button" name="{$sModuleName|escape:"html"}ConnectButton" value="{l s='Update' mod='facebookpsconnect'}" class="btn btn-success" onclick="{$sModuleName|escape:"html"}.form('{$sModuleName|escape:"html"}BasicForm', '{$sURI}', null, '{$sModuleName|escape:"html"}BasicSettings', '{$sModuleName|escape:"html"}BasicSettings', null, false, false, 'Basic');return false;" />
					{else}
						<input type="submit" name="{$sModuleName|escape:"html"}ConnectButton" value="{l s='Update' mod='facebookpsconnect'}" class="btn btn-success" />
					{/if}
				</div>
			</div>
		</form>
		</div>

		<div class="fbpscClearAdmin"></div>
		<div class="adminErrors" id="{$sModuleName|escape:"html"}BasicError"></div>

	{literal}
		<script type="text/javascript">
		$(document).ready(function()
		{
			$("a#DisplayBlockInfoAccountExample").fancybox({
				'hideOnContentClick' : false,
				'autoDimensions' : true
			});

			$("#{/literal}{$sModuleName}{literal}Tabs").tabs({selected : {/literal}{if isset($iActiveTab)}{$iActiveTab}{else}0{/if}{literal}});

			$(".icon-question-sign").tooltip();
			$(".label-tooltip").tooltip();
		});
	</script>
	{/literal}