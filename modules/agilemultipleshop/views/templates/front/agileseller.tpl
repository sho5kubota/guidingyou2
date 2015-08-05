{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade Agile Module to newer
* versions in the future. If you wish to customize Agile Module for your
* needs please contact us at http://addons-modules.com/contact-us.
*
* @module Agile Seller Products  
* @author Kinro Sho <shokinro@agileservex.com>
* @copyright agileservex.com
* @version 1.0
*}
{include file="$tpl_dir./errors.tpl"}
{* 
<h1>{strip}
	{$seller_info->company|escape:'htmlall':'UTF-8'}
	{/strip}
</h1> *}

<img id="seller_logo" src="{$seller_info->get_seller_logo_url()}"  style="display:none;overflow:hidden" />
<div id="seller-block" class="box">
  {* <pre>{$seller_info|@print_r}</pre> *}

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">{strip}{$seller_info->company|escape:'htmlall':'UTF-8'}{/strip}</h3>
		</div>
		<div class="panel-body">
        	<div class="row">
        		<!-- LOGO BLOCK -->
        		<div id="logo-block" class="col-xs-12 col-sm-4 col-md-4">
					<a class="thumbnail" href="#seller_logo">
						<img src="{$seller_info->get_seller_logo_url()}" title="Logo" alt="Logo" style="display:block;max-width:100%;height:auto;overflow:hidden" />
					</a>

				</div>
        		<div class=" col-md-8 col-lg-8 "> 
                	<table class="table table-user-information">
                    	<tbody>
                    		

                      		<!-- City -->
                          {if !empty($seller_info->city)}
                      		<tr>
                        		<td>{l s='City' mod='agilemultipleshop'}:</td>
                        		<td>{$seller_info->city}</td>
                      		</tr>
                      		{/if}
                      		
                   			<!-- Country -->
                       		<tr>
                        		<td>{l s='Country' mod='agilemultipleshop'}:</td>
                        		<td>{$seller_info->country}</td>
                      		</tr>

                      		<!-- Dialect -->
                          {if !empty($seller_info->language)}
                        	<tr>
                        		<td>{l s='Dialect' mod='agilemultipleshop'}:</td>
                        		<td>
	                        		{foreach from=$seller_info->language item=value}
            										{$value}<br />
            									{/foreach}
            								</td>
                      		</tr>
                          {/if}

                          <!-- Country -->
                          <tr>
                            <td>{l s='Description' mod='agilemultipleshop'}:</td>
                            <td>{$seller_info->description}</td>
                          </tr>
                      		

                      		<!-- License -->
                           {if $license_exist eq 1}
                            {if empty($isMobile)}
                            <tr> 
                              <td>{l s='License' mod='agilemultipleshop'}:</td>
                                  		{* <td>{{if !empty($seller_info->license)}
          										{$seller_info->license}
          									{/if}  *}
                              <td>

          									     <div class="col-xs-12 col-sm-7 col-md-7">
            										    <img width="202" height="30" src="../img/as/certified.jpg" />
          									     </div>					
                              </td>   
                            </tr>
                            {/if}
                          {/if}


                    </tbody>
                  </table>
                  
                </div>
                </div><!-- end table responsive -->
                  {if $license_exist eq 1}
                  {if $isMobile}
                 <!-- LICENSE BLOCK -->
                   <div id="logo-block" class="col-xs-12 col-sm-4 col-md-4">
                    <img width="202" height="30" src="../img/as/certified.jpg" />
                  </div>
                  {/if}
                  {/if}

        	</div>
        </div>

    <hr><hr>

	<div class="row">

		<div class="col-lg-12">
			<h1 class="page-header">{$seller_info->company|escape:'htmlall':'UTF-8'} Gallery</h1>
		</div>

		{foreach from=$seller_info->seller_images key=k item=image}
			<img id="content{$k}" class="img-responsive" src="{$seller_info->getLogoFolder($seller_info->id_sellerinfo)}{$image}" style="display:none">
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a class="thumbnail" href="#content{$k}">
					<img class="img-responsive" src="{$seller_info->getLogoFolder($seller_info->id_sellerinfo)}{$image}" alt="">
                </a>
            </div>
    	{/foreach}
    </div>



</div> <!-- End of Box -->

<script type="text/javascript">
    $(document).ready(function(){
        $('.thumbnail').fancybox({
			    'scrolling'   : 'no',
			}
		);
    });
</script>

<!-- 20150429 add start mizobuchi -->
{hook h="categoryTop"}
<!-- 20150429 add end mizobuchi -->


<div>
	{if $nb_products > 1}{l s='There are' mod='agilemultipleshop'} <span class="bold">{$nb_products} {l s='products.' mod='agilemultipleshop'}</span>{else}{l s='There is' mod='agilemultipleshop'} <span class="bold">{$nb_products} {l s='product.' mod='agilemultipleshop'}</span>{/if}
</div>

{if $products}
	<div class="content_sortPagiBar">
		<div class="sortPagiBar clearfix">
			{include file="$tpl_dir./product-sort.tpl"}
			{include file="$tpl_dir./product-compare.tpl"}
			{include file="$tpl_dir./nbr-product-page.tpl"}
		</div>
	</div>
    <div id="view_way" class="{if isset($warehouse_vars.product_view) && $warehouse_vars.product_view == 1}list_view{else} grid_view{/if}">               
				{include file="$tpl_dir./product-list.tpl" products=$products}
	</div>
	{include file="$tpl_dir./pagination.tpl"}

{/if}

<script lang="javascript" type="text/javascript">
	$('document').ready( function() {
		$("#top_column").hide();
	});
</script>

{hook h="displayBlogSeller"}