{* <pre>{$view_data|@print_r}</pre> *}
<div class="block">
    <h2 class='sdstitle_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}" style="color:#333;">{l s='Latest guide blog' mod='smartbloghomelatestnews'}</a></h2>
    <div class="sdsblog-box-content">
        {if isset($view_data) AND !empty($view_data)}
            {assign var='i' value=1}
            {foreach from=$view_data item=post}
               
                    {assign var="options" value=null}
                    {$options.id_post = $post.id}
                    {$options.slug = $post.link_rewrite}
                    <div id="sds_blog_post" class="col-xs-12 col-sm-4 col-md-3">
                        <div class="news_module_image_holder" style="height:200px">
                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                             {if $post.post_img != "no" }
                             
                             <img alt="{$post.title}" class="feat_img_small" src="{$modules_dir}smartblog/images/{$post.id_author}/{$post.post_img}-home-default.jpg">
                             {else}
                             <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured" style="max-height:200px">

                             {/if}
                             </a>
                        </div>
                        <span>{$post.date_added}</span>
                        <h4 class="sds_post_title"><a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title}</a></h4>
                        <p style="height:100px">
                            {$post.short_description|mb_strimwidth:0:180:'...':'UTF-8'|escape}
                        </p>
                        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"  class="r_more" style="color:#11a8ab;">{l s='Read More' mod='smartbloghomelatestnews'}</a>
                    </div>
                
                {$i=$i+1}
            {/foreach}
        {/if}
     </div>
</div>