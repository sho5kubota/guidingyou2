<pre>{$view_data|@print_r}</pre>
<div class="block">
    <h2 class='sdstitle_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Latest News' mod='smartbloghomelatestnews'}</a></h2>
    <div class="sdsblog-box-content">
        {if isset($view_data) AND !empty($view_data)}
            {assign var='i' value=1}
            {foreach from=$view_data item=post}
               
                    {assign var="options" value=null}
                    {$options.id_post = $post.id}
                    {$options.slug = $post.link_rewrite}
                    <div id="sds_blog_post" class="col-xs-12 col-sm-4 col-md-3">
                        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                        <span class="news_module_image_holder">
                             {if $post.post_img != "no" }
                             
                             <img alt="{$post.title}" class="feat_img_small" src="{$modules_dir}smartblog/images/{$post.id_author}/{$post.post_img}-home-default.jpg">
                             {else}
                             <img itemprop="image" alt="{$post.title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured">
                             {/if}
                             </a>
                        </span>
                        <span>{$post.date_added}</span>
                        <h4 class="sds_post_title"><a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title}</a></h4>
                        <p>
                            {$post.short_description}
                        </p>
                        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"  class="r_more">{l s='Read More' mod='smartbloghomelatestnews'}</a>
                    </div>
                
                {$i=$i+1}
            {/foreach}
        {/if}
     </div>
</div>