{* <pre>{$view_data|@print_r}</pre> *}
{assign var=seller_options value=['id_seller' => $view_data[0]['id_author'], 'slug' => $view_data[0]['seller_alias']]}
{* <pre>{$seller_options|@print_r}</pre> *}
<div class="block">
    <h2 class='sdstitle_block' style="color:#333"><a href="{smartblog::GetSmartBlogLink('smartblog_sellers',$seller_options)}">{l s='Seller\'s Blog' mod='smartbloglist'}</a></h2>
    {* <h2 class='sdstitle_block'>{l s='Seller\'s Blog' mod='smartbloglist'}</h2> *}
    <div class="sdsblog-box-content">
        {if isset($view_data) AND !empty($view_data)}
            {assign var='i' value=1}
            {foreach from=$view_data item=post}
               
                    {assign var="options" value=null}
                    {$options.id_post = $post.id}
                    {$options.slug = $post.link_rewrite}
                    <div id="sds_blog_post" class="col-xs-12 col-sm-4 col-md-3">
                        <div class="news_module_image_holder" style="height:180px">
                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                             {if $post.post_img != "no" }
                             
                             <img alt="{$post.title}" class="feat_img_small" src="{$modules_dir}smartblog/images/{$post.id_author}/{$post.post_img}-home-default.jpg">
                             {else}
                             <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured">
                             </a>
                             {/if}
                        </div>
                        <span>{$post.date_added}</span>
                        <h4 class="sds_post_title"><a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title}</a></h4>
                        <p style="height:90px">
                            {$post.short_description|truncate:125:'...':true}
                        </p>
                        <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"  class="r_more">{l s='Read More' mod='smartbloglist'}</a>
                    </div>
                
                {$i=$i+1}
            {/foreach}
        {/if}
     </div>
</div>