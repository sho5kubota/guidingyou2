{extends file="helpers/form/form.tpl"}
{block name="field"}
	{if $input.type == 'htmlhr'}
		<div class="sep col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if} {if !isset($input.label)}col-lg-offset-3{/if}">
			<hr />
		</div>
    {elseif $input.type == 'agile_text_addon'}
		<div class="input-group col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if} {if !isset($input.label)}col-lg-offset-3{/if}">
			{assign var='value_text' value=$fields_value[$input.name]}
			{assign var='value_text_addon' value=$fields_value[$input.addon_name]}
			<input type="text"
				name="{$input.name}"
				id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"
				value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'html':'UTF-8'}{else}{$value_text|escape:'html':'UTF-8'}{/if}"
				class="{if isset($input.class)}{$input.class}{/if}{if $input.type == 'tags'} tagify{/if}"
				{if isset($input.size)} size="{$input.size}"{/if}
				{if isset($input.maxchar)} data-maxchar="{$input.maxchar}"{/if}
				{if isset($input.maxlength)} maxlength="{$input.maxlength}"{/if}
				{if isset($input.readonly) && $input.readonly} readonly="readonly"{/if}
				{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}
				{if isset($input.autocomplete) && !$input.autocomplete} autocomplete="off"{/if}
				{if isset($input.required) && $input.required } required="required" {/if}
				{if isset($input.placeholder) && $input.placeholder } placeholder="{$input.placeholder}"{/if}
				/>
			<span class="input-group-addon">{$input.addon_text}</span>
			<input id="{$input.addon_id}" name="{$input.addon_name}" value="{$value_text_addon}" maxlength="{$input.size_addon}" type="text">
		</div>	{else}
		{$smarty.block.parent}
    {/if}
{/block}

{block name="input"}
   {if $input.type == 'agile_radio_checkbox'}
		{foreach $input.values as $value}
			<div class="radio {if isset($input.class)}{$input.class}{/if}">
				{strip}
				<label>
				<input type="radio"	name="{$input.name}" id="{$value.id}" value="{$value.value|escape:'html':'UTF-8'}"{if $fields_value[$input.name] == $value.value} checked="checked"{/if}
				{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}{if isset($value.onclick) && $value.onclick} onClick="{$value.onclick}"{/if}/>
					{$value.label}
				</label>
				{/strip}
			</div>
			{if isset($value.p) && $value.p}<p class="help-block">{$value.p}</p>{/if}
			{if isset($value.checkbox_list) && $value.checkbox_list}
				<div class="form-group {if isset($value.checkbox_list.class)}{$value.checkbox_list.class}{/if}" style="display:{if $fields_value[$input.name] != $value.value}none{else}block{/if}">
					{foreach $value.checkbox_list.query as $checkbox}
						{assign var=id_checkbox value=$checkbox[$value.checkbox_list.id]}
						<div class="checkbox">
							{strip}
								<label for="{$id_checkbox}">
									<input type="checkbox" name="{$id_checkbox}" id="{$id_checkbox}" {if isset($checkbox.val)} value="{$checkbox.val|escape:'html':'UTF-8'}"{/if}{if isset($fields_value[$id_checkbox]) && $fields_value[$id_checkbox]} checked="checked"{/if} />
									{$checkbox[$value.checkbox_list.name]}
								</label>
							{/strip}
						</div>
					{/foreach}
				</div>
			{/if}
		{/foreach}
    {else}
		{$smarty.block.parent}
    {/if}
{/block}
