{capture name=path}<a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='All Blog News' mod='smartblog'}</a>
     {if $title_category != ''}
    <span class="navigation-pipe">{$navigationPipe}</span>{$title_category}{/if}{/capture}
    {if $postcategory == ''}
             <p class="error">{l s='No Post in Archive' mod='smartblog'}</p>
    {else}   
    <!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-warning">Month</button>
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">January</a></li>
        <li role="separator" class="divider"></li>
    <li><a href="#">February</a></li>
        <li role="separator" class="divider"></li>
    <li><a href="#">March</a></li>
        <li role="separator" class="divider"></li>
    <li><a href="#">April</a></li>
  </ul>
</div>
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

