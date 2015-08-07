{* <pre>{$posts|@print_r}</pre> *}
{* <pre>{$seller_options|@print_r}</pre> *}
<div class="block">
    <h2 class='sdstitle_block'>{l s='Seller\'s Blog' mod='smartbloglist'}</h2>
    {* <h2 class='sdstitle_block'>{l s='Seller\'s Blog' mod='smartbloglist'}</h2> *}
    <div class="sdsblog-box-content">
        {if isset($posts) AND !empty($posts)}
            {assign var='i' value=1}
            {foreach from=$posts item=post}
               
                    {assign var="options" value=null}
                    {$options.id_post = $post.id_smart_blog_post}
                    {$options.slug = $post.link_rewrite}
                    <div id="sds_blog_post" class="col-xs-12 col-sm-4 col-md-3">
                        <span class="news_module_image_holder">
                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                             {if $post.post_img != "no" }
                             
                             <img alt="{$post.meta_title}" class="feat_img_small" src="{$modules_dir}smartblog/images/{$post.id_author}/{$post.post_img}-home-default.jpg">
                             {else}
                             <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured">
                             </a>
                             {/if}
                        </span>
                        <span>{$post.created}</span>
                        <h4 class="sds_post_title"><a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.meta_title}</a></h4>
                        <p>
                            {$post.short_description|strip_tags|html_entity_decode}
                        </p>
                        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"  class="r_more">{l s='Read More' mod='smartbloglist'}</a>
                    </div>
                
                {$i=$i+1}
            {/foreach}
        {/if}
     </div>

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