{capture name=path}<a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='All Blog News' mod='smartblog'}</a>
    {if $title_category != ''}
    <span class="navigation-pipe">{$navigationPipe}</span>{$title_category}{/if}{/capture}
    {if $postcategory == ''}
        {if $title_category != ''}
             <p class="error">{l s='No Post in Category' mod='smartblog'}</p>
        {else}
             <p class="error">{l s='No Post in Blog' mod='smartblog'}</p>
        {/if}
    {else}
	{if $smartdisablecatimg == '1'}
                  {assign var="activeimgincat" value='0'}
                    {$activeimgincat = $smartshownoimg} 
        {if $title_category != ''}        
           {foreach from=$categoryinfo item=category}
            <div id="sdsblogCategory">
               {if $cat_image != "no" }
                   <img alt="{$category.meta_title}" src="{$modules_dir}/smartblog/images/category/{$cat_image}-home-default.jpg" class="imageFeatured">
               {/if} 
               {$category.description}
            </div>
             {/foreach}  
        {/if}
    {/if}
    
    <div class="row">
        <div class="col-md-6">
        {if $page_type=='seller' || $page_type == 'archive'}
            <h3>{$postcategory[0]['firstname']} {$postcategory[0]['lastname']} {l s='Blog' mod='smartblog'}</h3>
        {/if}
        </div>

        <div class="col-md-6">
        {if $page_type=='seller' || $page_type == 'archive'}
            <h3>
            <a href="{$link->getAgileSellerLink($postcategory[0]['id_author'])}">
                {$postcategory[0]['firstname']} {$postcategory[0]['lastname']} {l s='Guide Page' mod='smartblog'}
            </a>
            </h3>
        {/if}
        </div>

    </div>

    {if $page_type=='seller' || $page_type == 'archive'}
    <div class="row">
        <div class="col-md-12">
        <a href="{smartblog::GetSmartBlogLink('smartblog_year', ['year' => $year['prev'], 'seller_id' => $id_author])}"> << </a> 
        {$year['current']} 
        <a href="{smartblog::GetSmartBlogLink('smartblog_year', ['year' => $year['next'], 'seller_id' => $id_author])}"> >> </a>
            <div class="btn-group">
              {foreach from=$date['month'] item=m key=key}
                {assign var=arch value=['year' => $date['year'][$key], 'month' => $key, 'seller_id' => $id_author]}
                  <a href="{smartblog::GetSmartBlogLink('smartblog_month', $arch)}" class="btn btn-{if $key==$active_month}warning{else}default{/if}">{$m}</a>
              {/foreach}
            </div>
        </div>
    </div>
    {/if}


    <div id="smartblogcat" class="block">
   
{foreach from=$postcategory item=post}
    {include file="./category_loop.tpl" postcategory=$postcategory}
{/foreach}
    </div>
   <pre>{$page|@print_r}</pre>
    {if !empty($pagenums)}
    <div class="row">
    <div class="post-page col-md-12">
            <div class="col-md-6">
                <ul class="pagination">

                    {if $limit_start > 0}
                        {assign var='p_previous' value=$k-1}
                        <li id="pagination_previous"><a rel="{$p_previous}" class="pagination_page_number" href="">&laquo;&nbsp;{l s='Previous' mod='smartsellerblog'}</a>
                        </li>
                    {else}
                        <li id="pagination_previous" class="disabled"><span>&laquo;&nbsp;{l s='Previous' mod='smartsellerblog'}</span></li>
                    {/if}

                    {for $k=0 to $pagenums}
                        {if $title_category != ''}
                            {assign var="options" value=null}
                            {$options.page = $k+1}
                            {$options.id_category = $id_category}
                            {$options.slug = $cat_link_rewrite}
                        {elseif $seller_slug != ''}
                            {assign var="options" value=null}
                            {$options.page = $k+1}
                            {$options.id_seller = $id_author}
                            {$options.slug = $seller_slug}
                        {else}
                            {assign var="options" value=null}
                            {$options.page = $k+1}
                        {/if}
                        {* <pre>{$options|@print_r}</pre> *}

                        {if ($k+1) == $c}
                            <li><span class="page-active">{$k+1}</span></li>
                        {else}
                                {if $title_category != ''}
                                    <li><a class="page-link" href="{smartblog::GetSmartBlogLink('smartblog_category_pagination',$options)}">{$k+1}</a></li>
                                {elseif $seller_slug != ''}
                                    <li><a class="page-link" href="{smartblog::GetSmartBlogLink('smartblog_sellers_pagination',$options)}">{$k+1}</a></li>
                                {else}
                                    <li><a class="page-link" href="{smartblog::GetSmartBlogLink('smartblog_list_pagination',$options)}">{$k+1}</a></li>
                                {/if}
                        {/if}
                   {/for}
                   {if $limit_start <= 0 }
                       {*  {assign var="options" value=null}
                        {$options.page = $page['next']}
                        {$options.id_seller = $id_author}
                        {$options.slug = $seller_slug}
                        <li id="pagination_next"><a class="pagination_page_number"  href="{smartblog::GetSmartBlogLink('smartblog_category_pagination',$options)}">
                        {l s='Next' mod='smartsellerblog'}&nbsp;&raquo;</a>
                        </li> *}
                    {else}
                        <li id="pagination_next" class="disabled"><span>{l s='Next' mod='smartsellerblog'}&nbsp;&raquo;</span></li>
                    {/if}

                </ul>
			</div>
			<div class="col-md-6">
                <div class="results">{l s="Showing" mod="smartblog"} {if $limit_start!=0}{$limit_start}{else}1{/if} {l s="to" mod="smartlatestnews"} {if $limit_start+$limit >= $total}{$total}{else}{$limit_start+$limit}{/if} {l s="of" mod="smartblog"} {$total} ({$c} {l s="Pages" mod="smartblog"})</div>
            </div>
  </div>
  </div> {/if}
 {/if}
{if isset($smartcustomcss)}
    <style>
        {$smartcustomcss}
    </style>
{/if}



