{* <pre>{$postcategory|@print_r}</pre> *}

<div class="row">
        <div class="col-md-6">
        {if $page_type=='seller' || $page_type == 'archive'}
            <h3>{$store_name} {l s='Blog' mod='smartblog'}</h3>
        {/if}
        </div>

        <div class="col-md-6">
        {if $page_type=='seller' || $page_type == 'archive'}
            <h3>
            <a href="{$link->getAgileSellerLink($id_author)}">
                {$store_name} {l s='Guide Page' mod='smartblog'}
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



{capture name=path}<a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='All Blog News' mod='smartblog'}</a>
     {if $title_category != ''}
    <span class="navigation-pipe">{$navigationPipe}</span>{$title_category}{/if}{/capture}
    {if $postcategory == ''}
             <p class="error">{l s='No Post in Archive' mod='smartblog'}</p>
    {else}   

    {* <pre>{$year|@print_r}</pre> *}
    


    <div id="smartblogcat" class="block">
{foreach from=$postcategory item=post}
    {include file="./category_loop.tpl" postcategory=$postcategory}
{/foreach}
    </div>


 {/if}
 {if isset($smartcustomcss)}
    <style>
        {$smartcustomcss}
    </style>
{/if}

