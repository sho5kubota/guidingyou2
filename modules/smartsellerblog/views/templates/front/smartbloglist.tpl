{capture name=path}<a href="{$link->getPageLink('my-account.php')}">{l s='My Account' mod='agilemultipleseller'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='Guide Blog'  mod='smartsellerblog'}{/capture}

<h1 class="withAdditional">{l s='My Guiding Blog' mod='smartsellerblog'}</h1>
<a href="{$link->getCMSLink('22','whats-guide-member')|escape:'html'}" class="additionalLink">{l s='Explanation of guide member' mod='smartsellerblog'}</a>
{include file="modules/agilemultipleseller/views/templates/front/seller_tabs.tpl"}
<div id="agile">
	<div class="block-center clearfix" id="block-history">
		<div class="row">
			<div class="agile-col-sm-2">
			<a class="agile-btn agile-btn-default" href="{$link->getModuleLink('smartsellerblog', 'smartform', ['id_smart_blog_post' =>0], true)}">
					<i class="icon-plus-sign"></i>&nbsp;{l s='Add New' mod='smartsellerblog'}
			</a>
			</div>
			{* <div class="agile-col-sm-5">
				<div class="row">
					<div class="agile-col-sm-3">
						{l s='Order By:' mod='smartsellerblog'}
					</div>
					<div class="agile-col-sm-6">
						<select name="agile_orderby" id="agile_orderby">
							<option value="p.id_product" {if $agile_orderby=='p.id_product'}selected{/if}>{l s='ID' mod='smartsellerblog'}</option>
							<option value="pl.name" {if $agile_orderby=='pl.name'}selected{/if}>{l s='Product Name' mod='smartsellerblog'}</option>
							<option value="cl.name" {if $agile_orderby=='cl.name'}selected{/if}>{l s='Category Name' mod='smartsellerblog'}</option>
							<option value="p.active" {if $agile_orderby=='p.active'}selected{/if}>{l s='Enabled' mod='smartsellerblog'}</option>
							<option value="po.approved" {if $agile_orderby=='po.approved'}selected{/if}>{l s='Approved' mod='smartsellerblog'}</option>
							<option value="p.date_add" {if $agile_orderby=='p.date_add'}selected{/if}>{l s='Date Added' mod='smartsellerblog'}</option>
						</select>
					</div>
					<div class="agile-col-sm-3">
						<select id="agile_orderway">{$agile_orderway}
							<option value="ASC" {if $agile_orderway=='ASC'}selected{/if}>{l s='Ascending' mod='smartsellerblog'}</option>
							<option value="DESC" {if $agile_orderway=='DESC'}selected{/if}>{l s='Descedning' mod='smartsellerblog'}</option>
						</select>
					</div>
				</div>
			</div> *}
			<div class="agile-col-sm-1"></div>

			{* <div class="agile-col-sm-4">
				<div class="row">
					<div class="agile-col-sm-3">
						{l s='Filter By' mod='smartsellerblog'}
					</div>
					<div class="form-group agile-col-sm-5">
						<select name="agile_filterby" id="agile_filterby">
							<option value=""></option>
							<option value="p.id_product" {if $agile_filterby=='p.id_product'}selected{/if}>{l s='ID =' mod='smartsellerblog'}</option>
							<option value="pl.name" {if $agile_filterby=='pl.name'}selected{/if}>{l s='Product Name like' mod='smartsellerblog'}</option>
							<option value="cl.name" {if $agile_filterby=='cl.name'}selected{/if}>{l s='Category Name like' mod='smartsellerblog'}</option>
							<option value="p.active" {if $agile_filterby=='p.active'}selected{/if}>{l s='Enabled =' mod='smartsellerblog'}</option>
							<option value="po.approved" {if $agile_filterby=='po.approved'}selected{/if}>{l s='Approved =' mod='smartsellerblog'}</option>
						</select>
					</div>
					<div class="agile-col-sm-2">
						<input type="text" name="agile_filterval" id="agile_filterval" value="{$agile_filterval}">
					</div>
					<div class="agile-col-sm-2">
						<input type="button" name="btnGo" value="Go" onclick="goOnClick()">
					</div>

				</div>
			</div> *}
	    </div>

	</div>
</div>
{* {include file="$tpl_dir./pagination.tpl"} *}
{include file="modules/smartsellerblog/views/templates/front/pagination.tpl"}
<table id="product-list" class="std">
	<thead>
		<tr>
			<th class="first_item" style="width:60px">{l s='ID' mod='smartsellerblog'}</th>
			<th class="item" style="width:20%">{l s='Media' mod='smartsellerblog'}</th>
			<th class="item">{l s='Category' mod='smartsellerblog'}</th>
			<th class="item">{l s='Name' mod='smartsellerblog'}</th>
			<th class="item">{l s='Description' mod='smartsellerblog'}</th>
			<th class="item" style="width:80px">{l s='Active' mod='smartsellerblog'}</th>

			<th class="item" style="width:80px">{l s='Action' mod='smartsellerblog'}</th>

	        </tr>
	</thead>
        <tbody>
        {foreach from=$blogs item=blog name=blogs}
        <tr>
        	<td class="pointer left">{$blog['id_smart_blog_post']}</td>
        	<td class="pointer center">
        		<div class="row">
				  <div class="col-xs-6 col-md-6">
				    <a href="{$link->getModuleLink('smartsellerblog', 'smartform', ['id_smart_blog_post'=> $blog['id_smart_blog_post']], true)}" class="thumbnail">
				      <img src="{$modules_dir}/smartblog/images/{$blog['id_author']}/{$blog['id_smart_blog_post']}-home-default.jpg" alt="{$meta_title}">
				    </a>
				  </div>
				</div>
        	</td>
        	<td class="pointer left">{$blog['cat_title']}</td>
        	<td class="pointer left"><a href="{$link->getModuleLink('smartsellerblog', 'smartform', ['id_smart_blog_post' => $blog['id_smart_blog_post']], true)}">{$blog['meta_title']}</a></td>
        	<td class="pointer left">{$blog['short_description']|html_entity_decode|strip_tags:true}</td>
        	<td class="pointer center">
        		{if $blog['active'] == 1}
					<a href="{$link->getModuleLink('smartsellerblog', 'smartlist', ['process' => 'inactive', 'id_smart_blog_post'=> $blog['id_smart_blog_post']], true)}" ><img src="{$base_dir_ssl}img/admin/enabled.gif" /></a>
				{else}
					<a href="{$link->getModuleLink('smartsellerblog', 'smartlist', ['process' => 'active', 'id_smart_blog_post'=> $blog['id_smart_blog_post']], true)}" ><img src="{$base_dir_ssl}img/admin/disabled.gif" /></a>
				{/if}
        	</td>
        	<td class="center">
		        <a href="{$link->getModuleLink('smartsellerblog', 'smartlist', ['process' => 'delete', 'id_smart_blog_post'=> $blog['id_smart_blog_post']], true)}" onclick="if (confirm('Delete selected item?')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"><img src="{$base_dir_ssl}img/admin/delete.gif" /></a>
		</td>
        </tr>
        {/foreach}
        </tbody>
</table>