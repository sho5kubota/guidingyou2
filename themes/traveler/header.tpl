{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{$lang_iso}"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="{$lang_iso}"><![endif]-->
<html lang="{$lang_iso}">
	<head>

		<meta charset="utf-8" />
		<title>{$meta_title|escape:'html':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}" />
{/if}
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
		<link rel="stylesheet" href="{$css_uri|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}" />
	{/foreach}
{/if}
{if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
	{$js_def}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
	{/foreach}
{/if}
		{$HOOK_HEADER}
		<script type="text/javascript" src="{$js_dir}wow.min.js"></script>
		<script type="text/javascript" src="{$js_dir}fileinput.min.js"></script>
		<script>new WOW().init();</script>  
		<link rel="stylesheet" href="{$css_dir}animate.css" type="text/css" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<link rel="stylesheet" href="{$css_dir}fileinput.css" type="text/css" />
		<link rel="stylesheet" href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />
		<link href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
		<link href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Bitter:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
			<link href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family=Roboto:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if IE 8]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
		$(document).ready(function() {
			$('#select-cat div').first().removeClass('selector');
			$('#select-cat span').first().remove();
		});
		</script>
	</head>
	
	<body{if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if isset($content_only) && $content_only} content_only{/if} lang_{$lang_iso}">
ok ka ba?
	{if !isset($content_only) || !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
			<div id="restricted-country">
				<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country|escape:'html':'UTF-8'}</span></p>
			</div>
		{/if}
		<div class="auth-form">{include file="$tpl_dir./authentication-top.tpl"}</div>
		<div class="clearfix"></div>
		<div id="page">
		
			<div class="header-container">
			
		<div class="clearfix"></div>
		
				<header id="header" >
					<div class="banner">
						<div class="container">
							<div class="row">
								{hook h="displayBanner"}
							</div>
						</div>
					</div>
					<div class="nav">
						<div class="container">
							<div class="row">
								<nav>{hook h="displayNav"}</nav>
							</div>
						</div>
					</div>
					<div>
						<div class="container">

							<div class="col-xs-12 col-sm-12 col-md-12" >

								<div class="row">

									<div class="col-xs-12 col-sm-12 col-md-4 " >
									{*{$base_dir}*}
										<a href="/" title="{$shop_name|escape:'html':'UTF-8'}" >
											<img class="logo img-responsive" src="{$logo_url}" alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($logo_image_width) && $logo_image_width} width="{$logo_image_width}"{/if}{if isset($logo_image_height) && $logo_image_height} height="{$logo_image_height}"{/if} />
										</a>
									</div>
									
									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" />
										<form method="get" action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" >
										<input type="hidden" name="controller" value="search" />
                                        <input type="hidden" name="orderby" value="position" />
                                        <input type="hidden" name="orderway" value="desc" />

										<input type="text" class="form-control col-xs-12 input-search-top" placeholder="Country and City" id="search_query_top" name="search_loc" >
					
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" id="select-cat"/>
										<select class="form-control input-search-top" name="search_cat">
											<option value="0">Guide and Activity</option>
									            {foreach $new_categories AS $category}
									            <optgroup label="{$category['name_main']}">
									              {if $category['child']|@count > 0}
									                {foreach $category['child'] AS $cat}
									                  <option  
									                   {if Tools::getValue('search_cat') eq $cat['id_category']}
									                    selected="selected"
									                    {/if}
									                  value="{$cat['id_category']}">
									                  {$cat['name']}
									              	  </option>
									                {/foreach}
									              {/if}
									            </optgroup>
									            {/foreach}
										</select>						
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" />
										 <input class="form-control input-search-top" type="text" id="" name="search_words" 
                                             {if !empty(Tools::getValue('search_words'))}
                                            	value="{Tools::getValue('search_words')}" 
                                            {/if}
                                            placeholder="Free Word"
                                            />
									</div>
									<input type='submit' style='display: inline-block ;float:left; height:1px; width:1px; visibility:hidden;position:absolute';  /> 
									</form>
									{if isset($HOOK_TOP)}{$HOOK_TOP}{/if}


	                               {*  <div id="center_column" class="center_column col-xs-12 col-sm-12">
	                                    <div class="container info-banners" style="overflow: hidden;border: none;">
	                                        
	                                    </div>
	                                </div> *}

                                </div>
								
							</div> <!-- end row -->
						</div>
					</div>
				</header>
			</div>

			{hook h="FrontSearch"}

			<div class="columns-container">
			<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12">{hook h="displayTopColumn"}</div>
					</div>
				<div id="columns" class="container">
					{if $page_name !='index' && $page_name !='pagenotfound'}
						{include file="$tpl_dir./breadcrumb.tpl"}
					{/if}
					
					<div class="row">
						{if isset($left_column_size) && !empty($left_column_size)}
						<div id="left_column" class="column col-xs-12 col-sm-{$left_column_size|intval}">{$HOOK_LEFT_COLUMN}</div>
						{/if}
						{if isset($left_column_size) && isset($right_column_size)}{assign var='cols' value=(12 - $left_column_size - $right_column_size)}{else}{assign var='cols' value=12}{/if}


						<div id="center_column" class="center_column col-xs-12 col-sm-{$cols|intval}">
	{/if}