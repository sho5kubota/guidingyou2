 {* <pre>{$categories|@print_r}</pre>  *}
 {* <pre>{$blog|@print_r}</pre> *}
<div id="agile">
	<div class="panel">
		{if not isset($blog['id_smart_blog_post'])}
			{assign var="id_blog" value="0"}
		{else}
			{assign var="id_blog" value=$blog['id_smart_blog_post']}
		{/if}
		
		<h1>{l s='My Guiding Blog' mod='smartsellerblog'}</h1>
		{include file="$tpl_dir./errors.tpl"}
		{include file="modules/agilemultipleseller/views/templates/front/seller_tabs.tpl"}
		<div class="row" {if $hasOwnerShip eq 1}{else}style="display:none;"{/if}>
		<form action="{$link->getModuleLink('smartsellerblog', 'smartform', ['id_smart_blog_post' => $id_blog], true)}" enctype="multipart/form-data" method="post" class="form-horizontal std">
			<h3>{l s='Create new blog' mod='smartsellerblog'}</h3>

			<input type="hidden" name="id_smart_blog_post" 
			{if !isset($blog['id_smart_blog_post'])}
			value="{$blog['id_smart_blog_post']}"
			{/if}
			 />

			 <input type="hidden" name="id_author" 
			{if !isset($blog['id_smart_blog_post'])}
			value="{$blog['id_author']}"
			{/if}
			 />

			<div class="form-group">
				<label class="control-label col-sm-3 col-md-3 col-lg-3 col-xl-3 required" for="title">
					<span>{l s='Title' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<input type="text" name="title" id="title" class="form-control" 
					{if isset($blog['id_smart_blog_post'])}
					value="{$blog['meta_title']}"
					{elseif !empty($post['title'])}
					value="{$post['title']}"
					{/if}
					/>
				</div>	
			</div>


			<div class="form-group">
				<label class="control-label col-sm-3 col-md-3 col-lg-3 col-xl-3" for="title">
					<span>{l s='Category' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-5 col-lg-5 col-xl-5">
					<select name="category">
						{foreach from=$categories key=key item=value}
							<option 
							{if isset($blog['id_smart_blog_post'])}
								{if $blog['id_category'] eq $value['id_smart_blog_category']}
									selected="selected"
								{/if}
							{/if}
							value="{$value['id_smart_blog_category']}" >{$value['meta_title']}</option>
						{/foreach}
					</select>
				</div>	
			</div>

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="short_description">
					<span>{l s='Short Description' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<textarea class="textarea"  cols="26" rows="13" id="short_description" name="short_description">{if isset($blog['id_smart_blog_post'])}{$blog['short_description']}{elseif !empty($post['short_description'])}{$post['short_description']}{/if}</textarea>
				</div>	


			</div>

			<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
			<script type="text/javascript">
        tinymce.init({
            selector: ".textarea"
        });
    </script>

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="content">
					<span>{l s='Content' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<textarea class="textarea"  cols="26" rows="13" id="content" name="content">{if isset($blog['id_smart_blog_post'])}{$blog['content']}{elseif !empty($post['content'])}{$post['content']}{/if}</textarea>
				</div>	
			</div>

			<div class="form-group">
		      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
		        <span class="label-tooltip" data-toggle="tooltip"
		          title="{l s='Format:' mod='agilemultipleseller'} JPG, GIF, PNG.">
		          {l s='Add Images'  mod='smartsellerblog'}
		        </span>
		      </label>

		      <div id="img_upload" class="agile-col-md-7 agile-col-lg-7 agile-col-xl-5" >
						<input name="img"  type="file" class="form-control" >
						<!-- <input {if empty($blog)}disabled="disabled"{/if} name="img"  type="file" class="form-control file" data-overwrite-initial="false" data-min-file-count="1"> -->
		      </div>
		    </div>


		     {if isset($blog['id_smart_blog_post'])}
		    <div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span>{l s='Active Image' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<img src="{$modules_dir}/smartblog/images/{$blog['id_author']}/{$blog['id_smart_blog_post']}-home-default.jpg">
				</div>	
			</div>
			{/if}
		    

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span>{l s='Youtube URL' mod='smartsellerblog'}</span>
				</label>

				<div id="youtube" class="col-sm-7 col-md-5 col-lg-5 col-xl-5">
					<input type="text" name="youtube" class="form-control" {if isset($blog['id_smart_blog_post'])}value="{$blog['youtube']}"{/if} />
				</div>	
			</div>

			<style>
				.videoWrapper {
					position: relative;
					padding-bottom: 56.25%; /* 16:9 */
					padding-top: 25px;
					height: 0;
				}
				.videoWrapper iframe {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
				}
			</style>

			<script>
				
		
				$(document).ready(function() {

					$('#youtube').on('click', function() {
					if($('#youtube input').attr('disabled') == 'disabled')
						alert('Please save the blog first');
					});

					$('#img_upload').on('click', function() {
					if($('#img_upload input').attr('disabled') == 'disabled')
						alert('Please save the blog first');
					});
				});
		

			</script>



			{if !empty($youtube_preview)}
			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span>{l s='Youtube Preview' mod='smartsellerblog'}</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<div class="videoWrapper">
					{$youtube_preview}
					</div>
				</div>	
			</div>
			{/if}


			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span>{l s='Status' mod='smartsellerblog'}</span>
				</label>

				<div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
					<select name="active">
						<option value="1" {if isset($blog['id_smart_blog_post'])} && $blog['active'] == 1}selected="selected"{/if}>{l s='Publish' mod='smartsellerblog'}</option>
						<option value="0" {if isset($blog['id_smart_blog_post'])} && $blog['active'] == 0}selected="selected"{/if}>{l s='Unpublish' mod='smartsellerblog'}</option>
					</select>
				</div>	
			</div>


			<div class="form-group agile-align-center">
				<button id="Save" type="submit" class="agile-btn agile-btn-default" name="saveBlog" value="{l s='Save' mod='smartsellerblog'}">
				<i class="icon-save"></i>&nbsp;<span>{l s='Save' mod='smartsellerblog'}</span></button>
			</div>

		</form>
		</div>
	</div>
</div>