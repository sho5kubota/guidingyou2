<div class="bootstrap">
	<div id="fpc">
		<div id="{$sModuleName|escape:"html"}ConfigureHook">
			<h3>{l s='Manage hook' mod='facebookpsconnect'} : {$aHook.title}</h3>
			<p>{l s='Simply drag and drop the desired connectors from the left-side list to the right-side drop area. You can then re-order them as desired by dragging them, or delete them by clicking the trash icon.' mod='facebookpsconnect'}</p>
			<div id="{$sModuleName|escape:"html"}DraggableConnector">
				<p><strong class="connectorTitle">{l s='Available connectors' mod='facebookpsconnect'}</strong></p>
				{if $bOneSet}
					<ul class="fbpscconnectorlist">
						{foreach from=$aConnectors name=connector key=cId item=cValue}
							{if !empty($cValue.data.activeConnector)}
								{assign var="bSetConnector" value=false}
								{if !empty($aHook.data)}
									{foreach from=$aHook.data name=hook key=cSetId item=cTitle}
										{if $cId == $cSetId}
											{assign var="bSetConnector" value=true}
										{/if}
									{/foreach}
								{/if}
								{if !$bSetConnector}
									<li id="{$cId|escape:"html"}" class="fbpscdragli">
										<img src="{$smarty.const._FPC_URL_IMG|escape:"html"}admin/connector_logo_{$cId}.gif" width="16" height="16" alt="{$cValue.title|escape:"html"}" align="absmiddle" /> {$cValue.title|escape:"html"}
									</li>
								{/if}
							{/if}
						{/foreach}
					</ul>
				{else}
					{l s='Please, see to configure one widget at least .' mod='facebookpsconnect'}
				{/if}
			</div>

			<div id="{$sModuleName|escape:"html"}DroppableConnector">
				<p><strong class="connectorTitle">{l s='Active connectors' mod='facebookpsconnect'}</strong></p>
				<ul id="{$sModuleName|escape:"html"}Sortable">
					{if !empty($aHook.data)}
						{foreach from=$aHook.data name=hook key=cId item=cTitle}
							<li id="{$cId|escape:"html"}" class="ui-state-default fbpscsortli">
								<img src="{$smarty.const._FPC_URL_IMG|escape:"html"}admin/connector_logo_{$cId}.gif" width="16" height="16" alt="{$cTitle}" align="absmiddle" /> {$cTitle}
								<img class="{$sModuleName|escape:"html"}Garbage" src="{$smarty.const._PS_ADMIN_IMG_|escape:"html"}delete.gif" alt="{l s='Delete' mod='facebookpsconnect'}" title="{l s='Delete' mod='facebookpsconnect'}" onclick="{$sModuleName|escape:"html"}.deleteConnector($('#{$cId}'));$('#{$cId}').draggable();"/>
							</li>
						{/foreach}
					{/if}
				</ul>
			</div>
			{if $bOneSet}
				<p class="clear">&nbsp;</p>
				<center>
					<input type="button" class="button btn btn-success" name="{$sModuleName|escape:"html"}HookButton" value="{l s='Update' mod='facebookpsconnect'}" onclick="{$sModuleName|escape:"html"}.updateHook('{$sURI|escape:"html"}&sAction={$aQueryParams.hook.action|escape:"html"}&sType={$aQueryParams.hook.type|escape:"html"}&sHookId={$sHookId|escape:"html"}', '{$sModuleName|escape:"html"}Sortable', '{$sModuleName|escape:"html"}HookList', '{$sModuleName|escape:"html"}HookList', true);return false;" />
				</center>
					{/if}
			<div id="{$sModuleName|escape:"html"}HookError">
				<div class="form-error">
				</div>
			</div>
		</div>

		{literal}
		<script>
			// set draggable
			{/literal}{$sModuleName}{literal}.draggableConnector();

			// set sortable
			{/literal}{$sModuleName}{literal}.sortableConnector();

			$(function() {
	    $( ".fbpscsortli" ).draggable();
	  });

		</script>
		{/literal}
	</div>
</div>


