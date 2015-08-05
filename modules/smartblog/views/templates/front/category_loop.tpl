{* <pre>{$postcategory|@print_r}</pre> *}
{* <pre>{$post|@print_r}</pre> *}
{assign var=seller value=['id_seller' => $post['id_author'], 'slug' => $post['seller_alias']]}
<div itemtype="#" itemscope="" class="sdsarticleCat clearfix">
    <div id="smartblogpost-{$post.id_post}">
    <div class="sdsarticleHeader">
         {assign var="options" value=null}
                            {$options.id_post = $post.id_post} 
                            {$options.slug = $post.link_rewrite}
                            <p class='sdstitle_block'><a title="{$post.meta_title}" href='{smartblog::GetSmartBlogLink('smartblog_post',$options)}'>{$post.meta_title}</a><a href="{$link->getAgileSellerLink($post.id_author)}" style="float:right">{l s="Go to this guide page" mod="smartblog"}</a></p>


             {assign var="options" value=null}
                        {$options.id_post = $post.id_post}
                        {$options.slug = $post.link_rewrite}
               {assign var="catlink" value=null}
                            {$catlink.id_category = $post.id_category}
                            {$catlink.slug = $post.cat_link_rewrite}

         <span>{l s='Posted by' mod='smartblog'} 
         <span itemprop="author">{if $smartshowauthor ==1}&nbsp;
         <a href="{smartblog::GetSmartBlogLink('smartblog_sellers',$seller)}">
           <i class="icon icon-user"></i>&nbsp; {if $smartshowauthorstyle != 0}{$post.firstname} {$post.lastname}{else}{$post.lastname} {$post.firstname}{/if}</span>{/if} 
           </a>
           &nbsp;&nbsp;

           <i class="icon icon-tags">
           </i>
         
         &nbsp; <span itemprop="articleSection">
         <a href="{smartblog::GetSmartBlogLink('smartblog_category',$catlink)}">{if $title_category != ''}{$title_category}{else}{$post.cat_name}{/if}</a></span> &nbsp;<span class="comment"> &nbsp;<i class="icon icon-comments"></i>&nbsp; <a title="{$post.totalcomment} Comments" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}#articleComments">{$post.totalcomment} {l s=' Comments' mod='smartblog'}</a></span>{if $smartshowviewed ==1}&nbsp; <i class="icon icon-eye-open"></i>{l s=' views' mod='smartblog'} ({$post.viewed}){/if}</span>
    </div>
    <div class="articleContent">
          <a itemprop="url" title="{$post.meta_title}" class="imageFeaturedLink">
                    {assign var="activeimgincat" value='0'}
                    {$activeimgincat = $smartshownoimg} 
                    {if $post.post_img != "no" }
              <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.id_author}/{$post.post_img}-single-default.jpg" class="imageFeatured">
                    {else}
                     <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured">
                    {/if}
          </a>
    </div>
           <div class="sdsarticle-des">
          <span itemprop="description" class="clearfix"><div id="lipsum">
	{$post.short_description|html_entity_decode|strip_tags}</div></span>
         </div>
        <div class="sdsreadMore">
                  {assign var="options" value=null}
                        {$options.id_post = $post.id_post}  
                        {$options.slug = $post.link_rewrite}  
                         <span class="more"><a title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" class="r_more">{l s='Read more' mod='smartblog'} </a></span>
        </div>
   </div>
</div>