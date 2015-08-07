{* <pre>{$page|@print_r}</pre>  *}
{* <pre>{$posts|@print_r}</pre> *}

{if isset($posts) AND !empty($posts)}
<div id="recent_article_smart_blog_block_left"  class="block blogModule boxPlain">
   <h2 class='sdstitle_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Blog Result' mod='smartblogsearchposts'}</a></h2>
   <div class="block_content sdsbox-content">
      <ul class="recentArticles">
        {foreach from=$posts item="post"}
             {assign var="options" value=null}
             {$options.id_post= $post.id_smart_blog_post}
             {$options.slug= $post.link_rewrite}
             <li>
                 <a class="image" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                    {if $post.post_img != 'no'}
                     <img alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.id_author}/{$post.post_img}-home-small.jpg">
                    {else}
                      <img alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-home-small.jpg">
                    {/if}

                 </a>
                 <a class="title"  title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.meta_title}</a>
               <span class="info">{$post.created|date_format:"%b %d, %Y"}</span>
             </li>
         {/foreach}
            </ul>

      {if $page['total_records'] > 5}
      <!-- Pagination -->
      <ul class="pagination">
        <li id="pagination_previous" class="{if $page['previous_page'] == $page['current_page'] }disabled{/if} pagination_previous">
          <a href="{$link->getPaginationLinkBlog(false, false, false, false, true, false, $p)}&pb={$page['previous_page']}">
              <i class="icon-chevron-left"></i> <b>Previous</b>
          </a>
        </li>
        
      {for $p=1 to $page['total_pages']}
        <li {if $page['current_page'] == $p}class="active current"{/if}>
          <a href="{$link->getPaginationLinkBlog(false, false, false, false, true, false, $p)}&pb={$p}">
            <span>{$p}</span>
          </a>
        </li>
      {/for}
    

        <li id="pagination_next" class="{if $page['next_page'] == $page['current_page'] }disabled{/if} pagination_next">
          <span>
            {if $page['next_page'] == $page['current_page'] }
              <b>Next</b> <i class="icon-chevron-right"></i>
            {else}
              <a href="{$link->getPaginationLinkBlog(false, false, false, false, true, false, $p)}&pb={$page['next_page']}">
                <b>Next</b> <i class="icon-chevron-right"></i>
              </a>
            {/if}
          </span>
        </li>
      </ul>
      {/if}

   </div>
</div>
{/if}