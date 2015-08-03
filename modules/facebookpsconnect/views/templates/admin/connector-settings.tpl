
{literal}
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("a#ConnectorEdit").fancybox({
				'hideOnContentClick' : false,
				'scrolling' : 'no',
				'autoDimensions' : 'true',
			});
		});
	</script>
{/literal}

<div class="bootstrap">
	<div class="clr_hr"></div>
	<div class="clr_20"></div>
	<h3>{l s='Manage Connectors' mod='facebookpsconnect'}</h3>
	<div class="fbpscClearAdmin"></div>
		<div class="form-group">
			<label {if $bVersion15_16 == true}class="control-label col-lg-2"{else}class="control-label"{/if}></label>
			<div {if $bVersion15_16 == true}class="col-lg-7"{else}class="col-lg-12"{/if}>
				<table style="width: 100%;" id="fbpsctabs" class="table  table-bordered table-striped" cellpadding="0" cellspacing="0">
					<thead>
					<tr class="nodrag nodrop">
						<th class="center">{l s='Connector name' mod='facebookpsconnect'}</th>
						<th class="center">{l s='Connector Configured' mod='facebookpsconnect'}</th>
						<th class="center">{l s='Hooks Configured' mod='facebookpsconnect'}</th>
						<th class="center" style="width: 50px">{l s='Edit' mod='facebookpsconnect'}</th>
					</tr>
					</thead>
					<tbody>
					{foreach from=$aConnectors name=connector key=cName item=cValue}
						<tr id="tr_{$smarty.foreach.connector.iteration|escape:"html"}">
							<td class="center"  style="width: 200px">{$cValue.title|escape:"html"}</td>
							<td class="center" style="width: 200px">
								{if $cValue.data === false}
									<img src="{$smarty.const._PS_ADMIN_IMG_}{if $iCompare == -1}delete.gif{else}module_notinstall.png{/if}" class="center" alt="{l s='Hooks and connector not configured' mod='facebookpsconnect'}" title="{l s='Hooks and connector not configured' mod='facebookpsconnect'}" />
								{elseif empty($cValue.hooks)}
									<img src="{$smarty.const._PS_ADMIN_IMG_|escape:"html"}warning.gif" class="center" alt="{l s='Hooks not configured' mod='facebookpsconnect'}" title="{l s='Hooks not configured' mod='facebookpsconnect'}" />
								{else}
									<img src="{$smarty.const._PS_ADMIN_IMG_|escape:"html"}enabled.gif" class="center" alt="{l s='Hooks and connector configured' mod='facebookpsconnect'}" title="{l s='Hooks and connector configured' mod='facebookpsconnect'}" />
								{/if}
							</td>
							<td class="center">
								{if !empty($cValue.hooks)}
									{foreach from=$cValue.hooks name=hook key=key item=hValue}{$hValue.title}{if !$smarty.foreach.hook.last}, {/if}{/foreach}
								{else}
									{l s='No hook configured' mod='facebookpsconnect'}
									<img src="{$smarty.const._PS_ADMIN_IMG_|escape:"html"}warning.gif" class="center" alt="{l s='No hook configured' mod='facebookpsconnect'}" title="{l s='No hook configured' mod='facebookpsconnect'}" />
								{/if}
							</td>
							<td class="center">
								<a id="ConnectorEdit" href="{$sURI|escape:"html"}&sAction={$aQueryParams.connectorForm.action|escape:"html"}&sType={$aQueryParams.connectorForm.type|escape:"html"}&iConnectorId={$cName|escape:"html"}" class="icon-edit"></a>
							</td>
						</tr>
					{/foreach}
					</tbody>
				</table>
			</div>
		</div>
</div>


