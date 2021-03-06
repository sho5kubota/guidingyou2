{literal}
	<script>
		$(function() {
			$(".label-tooltip").tooltip();
		});
		</script>
{/literal}
<div class="bootstrap" id="form_connector">
	<br/>
	<div class="form-group">
		<label class="control-label col-lg-5"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='You will want to check this box in most cases, unless you don\'t want this button displayed' mod='facebookpsconnect'}"><b>{l s='Activate the connector button' mod='facebookpsconnect'}</b></span> :</label>
		<div class="col-lg-3">
			<input type="checkbox" name="activeConnector" id="activeConnector" {if !empty($aConnector.data)}{if $aConnector.data.activeConnector == true}checked="checked"{/if}{else}checked="checked"{/if} /> <label class="fbpsclabel" for="param_send">{l s='Activate button' mod='facebookpsconnect'}</label>
			<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='You will want to check this box in most cases, unless you don\'t want this button displayed' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
		</div>
	</div>
	<br/>
	<div class="separator"></div>

	<div class="form-group">
		<label class="control-label col-lg-4">
			{l s='App ID' mod='facebookpsconnect'} :
		</label>
		<div class="col-xs-3">
			<input type="text" name="id" id="id" size="60" value="{if isset($aConnector.data.id)}{$aConnector.data.id}{/if}"  />
		</div>
		<a href="https://developer.paypal.com/webapps/developer/applications/myapps" target="_blank"><span class="icon-info-circle">&nbsp;{l s="Get my App ID" mod='facebookpsconnect'}</span></a>
	</div>

	<div class="separator"></div>

	<div class="form-group">
		<label class="control-label col-lg-4">{l s='App Secret' mod='facebookpsconnect'} :</label>
		<div class="col-xs-3">
			<input type="text" name="secret" id="secret" size="60" value="{if isset($aConnector.data.secret)}{$aConnector.data.secret}{/if}"  />
		</div>
		<a href="https://developer.paypal.com/webapps/developer/applications/myapps" target="_blank"><span class="icon-info-circle">&nbsp;{l s="Get my App Secret" mod='facebookpsconnect'}</span></a>
	</div>

	<div class="separator"></div>

	<div class="form-group">
		<label class="control-label col-lg-4"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='The callback URL is used to get the valid access token of your app' mod='facebookpsconnect'}" : ><b>{l s='Callback URL' mod='facebookpsconnect'}</b></span> :</label>
		<div class="col-xs-3">
			<input type="text" name="callback" id="callback" size="60" value="{if isset($aConnector.data.callback)}{$aConnector.data.callback}{else}{$sCbkUri}{/if}" />
		</div>
		<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='The callback URL is used to get the valid access token of your app' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
	</div>

	<div class="separator"></div>

	<div class="form-group">
		<label class="control-label col-lg-4"><span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='The style to display button' mod='facebookpsconnect'}"><b>{l s='Display style' mod='facebookpsconnect'}</b></span> :</label>
		<div class="col-xs-3">
			<select name="display">
				<option value="inline" {if isset($aWidget.data.display)}{if $aWidget.data.display == 'inline'}selected="selected"{/if}{else}selected="selected"{/if}>{l s='inline' mod='facebookpsconnect'}</option>
				<option value="block" {if isset($aWidget.data.display) && $aWidget.data.display == 'block'}selected="selected"{/if}>{l s='block' mod='facebookpsconnect'}</option>
			</select>
		</div>
		<span class="label-tooltip" data-toggle="tooltip" title data-original-title="{l s='The style to display button' mod='facebookpsconnect'}">&nbsp;<span class="icon-question-sign"></span></span>
	</div>

	<div class="separator"></div>

	<p class="alert alert-info">
		<a href="https://developer.paypal.com/webapps/developer/docs/integration/admin/manage-apps/" target="_blank">https://developer.paypal.com/webapps/developer/docs/integration/admin/manage-apps/</a>
	</p>
</div>
