{if isset($no_follow) AND $no_follow}
    {assign var='no_follow_text' value='rel="nofollow"'}
{else}
    {assign var='no_follow_text' value=''}
{/if}
{if isset($p) AND $p}

    {assign var='requestPage' value=$link->getPaginationLink2(false, false, false, false, true, false)}
    {assign var='requestNb' value=$link->getPaginationLink2(false, false, true, false, false, true)}

   {* <script type="text/javascript">
    $(document).ready(function() {
    	var pageNumber = $('.pagination_page_number li:first a').attr('rel');
    	alert(pageNumber);
    });
    </script>*}

    <!-- Pagination -->
    <div id="pagination" class="pagination">
    {if $start!=$stop}
        <ul class="pagination">
        {if $p != 1}
            {assign var='p_previous' value=$p-1}
            <li id="pagination_previous"><a {$no_follow_text} rel="{$p_previous}" class="pagination_page_number" href="{$link->goPage2($requestPage, $p_previous)}">&laquo;&nbsp;{l s='Previous' mod='smartsellerblog'}</a></li>
        {else}
            <li id="pagination_previous" class="disabled"><span>&laquo;&nbsp;{l s='Previous' mod='smartsellerblog'}</span></li>
        {/if}

        {section name=pagination start=$start loop=$stop+1 step=1}
            {if $p == $smarty.section.pagination.index}
                <li class="current"><span>{$p|escape:'htmlall':'UTF-8'}</span></li>
            {else}
                <li><a {$no_follow_text} rel="{$smarty.section.pagination.index}" class="pagination_page_number" href="{$link->goPage2($requestPage, $smarty.section.pagination.index)}">{$smarty.section.pagination.index|escape:'htmlall':'UTF-8'}</a></li>
            {/if}
        {/section}
        {if $pages_nb>$stop+2}
            <li><a rel="{$pages_nb}" class="pagination_page_number" href="{$link->goPage2($requestPage, $pages_nb)}">{$pages_nb|intval}</a></li>
        {/if}
        {if $pages_nb > 1 AND $p != $pages_nb}
            {assign var='p_next' value=$p+1}
            <li id="pagination_next"><a class="pagination_page_number" {$no_follow_text} rel="{$p_next}" href="{$link->goPage2($requestPage, $p_next)}">{l s='Next' mod='smartsellerblog'}&nbsp;&raquo;</a></li>
        {else}
            <li id="pagination_next" class="disabled"><span>{l s='Next' mod='smartsellerblog'}&nbsp;&raquo;</span></li>
        {/if}
        </ul>
    {/if}
    </div>

    <!-- /Pagination -->

{/if}