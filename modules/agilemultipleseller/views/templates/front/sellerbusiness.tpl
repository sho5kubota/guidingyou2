
{capture name=path}<a href="{$link->getPageLink('my-account.php')}">{l s='My Account' mod='agilemultipleseller'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='My Seller Account'  mod='agilemultipleseller'}{/capture}
{* <pre>{$sellerinfo->language_count|@print_r}</pre>
<pre>{$langs|@print_r}</pre> *}
<div id="agile">
<div class="panel">
<h1>{l s='My Seller Account' mod='agilemultipleseller'}</h1>
{include file="$tpl_dir./errors.tpl"}
        <script type="text/javascript">	
        var iso = "{$isoTinyMCE}";
        var pathCSS = '{$smarty.const._THEME_CSS_DIR_}';
        var ad = "{$ad}";

		var is_multilang = 1;
        </script>
		<script type="text/javascript">
			$(document).ready(function() {
				tinySetup(
				{
					selector: ".rte" ,
					toolbar1 : "code,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup"
				});

				$('.datepicker').datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd',
				});

				$(".datepicker").on("blur", function(e) { $(this).datepicker("hide"); }); 
			});

		</script>
        		
        {include file="$agilemultipleseller_views./templates/front/seller_tabs.tpl"}

    <script type="text/javascript">
    idSelectedCountry = {if isset($smarty.post.id_state)} {
    	$smarty.post.id_state|intval
    }
    {else}
	    {if isset($sellerinfo->id_state)}
	    	{$sellerinfo->id_state|intval}
    	{else} 
    		false
    	{/if}

    {/if};

		{if isset($countries)}
			{addJsDef agileCountries=$countries}
		{/if}


    </script>

	<script language="javascript" type="text/javascript">
		function changeMyLanguage(field, fieldsString, id_language_new, iso_code)
		{
			changeLanguage(field, fieldsString, id_language_new, iso_code);
			$("img[id^='language_current_']").attr("src","{$base_dir}img/l/" + id_language_new + ".jpg");
		}
	</script>


{if isset($seller_exists) AND $seller_exists}
    <form action="{$link->getModuleLink('agilemultipleseller', 'sellerbusiness', [], true)}" enctype="multipart/form-data" method="post" class="form-horizontal std">
        <h3>{l s='Your business information' mod='agilemultipleseller'}</h3>
        <input type="hidden" name="token" value="{$token}" />
	
	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="company_{$current_id_lang}">
			<span>
				{l s='Company' mod='agilemultipleseller'}
			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
				languages=$languages
				input_value=$sellerinfo->company
				input_name='company'
			}
		</div>
	</div>

	{if $is_multiple_shop_installed}

		<div class="form-group">
		{* HIDE SHOPNAME (REQUIRED) *}
		<input type="hidden" id="shop_name" name="shop_name" class="form-control" value="{if isset($smarty.post.shop_name)}{$smarty.post.shop_name}{else}{if isset($seller_shop->name)}{$seller_shop->name|escape:'htmlall':'UTF-8'}{/if}{/if}" class="form-control" />
					
		</div>

		<div class="form-group">
			<label for="shop_url" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
				<span>{l s='Shop full Url' mod='agilemultipleseller'}</span>
			</label>
			<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
				<div class="row">
					<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
						<input type="text" id="shop_url" name="shop_url" class="form-control" value="{$seller_shopurl->getURL()}" disabled=true class="form-control" />
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
		
		{* Hide Virtual URI (required) *}
		<input type="hidden" id="virtual_uri" name="virtual_uri"  class="form-control" value="{if isset($smarty.post.virtual_uri)}{$smarty.post.virtual_uri}{else}{if isset($seller_shopurl)}{$seller_shopurl->virtual_uri|escape:'htmlall':'UTF-8'}{/if}{/if}" class="form-control" />
	
		</div>

		{*
		<div class="form-group">
			<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_title_{$current_id_lang}">
				<span>
					{l s='Meta Title' mod='agilemultipleseller'}
				</span>
			</label>
			<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
				{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
					languages=$languages
					input_value=$sellerinfo->meta_title
					input_name='meta_title'
				}
			</div>
		</div>


		<div class="form-group">
			<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_tag_{$current_id_lang}">
				<span>
					{l s='Meta Tag' mod='agilemultipleseller'}
				</span>
			</label>
			<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
				{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
					languages=$languages
					input_value=$sellerinfo->meta_keywords
					input_name='meta_keywords'
				}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_description_{$current_id_lang}">
				<span>
					{l s='Meta Description' mod='agilemultipleseller'}
				</span>
			</label>
			<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
				{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
					languages=$languages
					input_value=$sellerinfo->meta_description
					input_name='meta_description'
				}
			</div>
		</div>
		*}

	{/if}



	


	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="address1_{$current_id_lang}">
			<span>
				{l s='Address' mod='agilemultipleseller'}
			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
				languages=$languages
				input_value=$sellerinfo->address1
				input_name='address1'
			}
		</div>
	</div>

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="address2_{$current_id_lang}">
			<span>
				{l s='Address (Line 2)' mod='agilemultipleseller'}
			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
				languages=$languages
				input_value=$sellerinfo->address2
				input_name='address2'
			}
		</div>
	</div>

	

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="city_{$current_id_lang}">
			<span>
				{l s='City' mod='agilemultipleseller'}
			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
				languages=$languages
				input_value=$sellerinfo->city
				input_name='city'
			}
		</div>
	</div>

	<div class="form-group id_state">
		<label for="id_state" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
			<span>{l s='State' mod='agilemultipleseller'}</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<select name="id_state" id="id_state">
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="id_country" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
			<span>{l s='Country' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<select id="id_country" name="id_country">{$countries_list}</select>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="postcode" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Postal Code' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3">
					<input type="text" id="postcode" name="postcode" class="form-control" value="{if isset($smarty.post.postcode)}{$smarty.post.postcode}{else}{if isset($sellerinfo->postcode)}{$sellerinfo->postcode|escape:'htmlall':'UTF-8'}{/if}{/if}" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" class="form-control" />
				</div>
			</div>
		</div>
	</div>


	<div class="form-group">
		<label for="phone" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
			<span>{l s='Phone' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<input type="text" id="phone" name="phone" class="form-control" value="{if isset($smarty.post.phone)}{$smarty.post.phone}{else}{if isset($sellerinfo->phone)}{$sellerinfo->phone|escape:'htmlall':'UTF-8'}{/if}{/if}" class="form-control" />
				</div>
			</div>
		</div>
	</div>

	{* LANGUAGE *}
	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="language_{$current_id_lang}">
			<span>
				{l s='Language' mod='agilemultipleseller'}
			</span>
		</label>
		<div class=" agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5" id="lang-append">
		{if !empty($sellerinfo->language_count[0])}
			{foreach from=$sellerinfo->language_count key=k item=language}
				<div class="row lang-row"  id="lang-div{$k}">
					<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5">
						<select id="lang[{$k}]" name="lang[{$k}]">
							{foreach from=$langs item=language}
							{* {if $sellerinfo->language_count[{$k}] eq $country['name']} selected="selected"{/if} value="{$country['id_country']}" *}
								<option {if $sellerinfo->language_count[{$k}] eq $language['name']} selected="selected"{/if}
								value="{$language['name']}">
									{$language['name']}
								</option>
							{/foreach}
							
						</select>
					</div>
					<div class="row" >
						<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5">
							<select id="lang_level[{$k}]" name="lang_level[{$k}]"  width="5">
								<option {if $sellerinfo->language_count_level[{$k}] eq 'Basic'} selected="selected"{/if} value="Basic">Basic</option>
								<option {if $sellerinfo->language_count_level[{$k}] eq 'Business'} selected="selected"{/if} value="Business">Business</option>
								<option {if $sellerinfo->language_count_level[{$k}] eq 'Native'} selected="selected"{/if} value="Native">Native</option>
							</select>


							

						</div>
							
							
							<div style="position:relative; right:25px; top:2px" class="agile-col-sm-1 agile-col-md-1 agile-col-lg-1 agile-col-xl-1">
								<button  key="{$k}" id="button-{$k}" type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
					

					</div>
				</div>
			{/foreach}
			{/if}
		</div>
	</div>

	

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="language_add">
			<span>
				{l s='Add new language' mod='agilemultipleseller'}
			</span>
		</label>
		<div class="row" >
			<div class=" agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5">
				<input class="duplicate_lang" type="button" value="Add" />
			</div>
		</div>
	</div>
			<script type="text/javascript">
				$(document).ready(function() {
					// Deleting A Language
					$('body').delegate('.close', 'click', function() {
						var key = ($(this).attr('key'));

						$.ajax({
							'type': 'POST',
							'data': 'key='+key +'&id_seller='+'{$sellerinfo->id}',
							'url': baseDir + 'modules/ajax_delete_lang.php',
							success: function(data) {
								var obj = jQuery.parseJSON(data);
								
								console.log(obj);
								$('#lang-div'+key).remove();
							}
						});

					});


					// Adding New Language HTML
					var x = $('#lang-append .lang-row').length;

					$('.duplicate_lang').click(function() {

						var lang_html = '<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5"><select id="lang['+x+']" name="lang['+x+']"><option>{$langs_list}</option><option value="Other Language">Other Language</option></select></div>';

						var html = '<div class="row"><div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5"><select id="lang_level['+x+']" name="lang_level['+x+']"  width="5"><option value="Basic">Basic</option><option value="Business">Business</option><option value="Native">Native</option></select></div><div class="agile-col-sm-1 agile-col-md-1 agile-col-lg-1 agile-col-xl-1" style="position:relative; right:25px; top:2px"><button key="'+x+'" id="button-'+x+'" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
						
						$('#lang-append').append('<div class="row lang-row" id="lang-div'+x+'">'+lang_html + html+'</div>');
						
						x++;

					});

				});

			</script>
	{* description *}
  <div class="form-group">
    <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="description_{$current_id_lang}">
      <span>
        {l s='Description' mod='agilemultipleseller'}
      </span>
    </label>
	<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		{foreach $languages AS $language}
			<div style="display: {($language.id_lang == $current_id_lang)? 'block' : 'none'};" class="translatable-field lang-{$language.id_lang} row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<textarea class="rte" id="description_{$language.id_lang}" aria-hidden="true" name="description_{$language.id_lang}" cols="26" rows="13">{if isset($smarty.post.description[{$language.id_lang}])}{$smarty.post.description[{$language.id_lang}]}{else}{if isset($sellerinfo->description[{$language.id_lang}])}{$sellerinfo->description[{$language.id_lang}]|escape:'htmlall':'UTF-8'}{/if}{/if}</textarea>
				</div>
				
			</div>
		{/foreach}
	</div>
  </div>
  <div class="form-group agile-align-center" style="border-bottom:3px solid rgb(27,	166,	229)	;margin-bottom:40px;">
		<span class="label-tooltip pull-right"> <sup>*</sup> {l s='Required field' mod='agilemultipleseller'}</span>
		<button class="save-guide1" type="submit" style="margin-top:20px;margin-bottom:40px;" class="agile-btn agile-btn-default" name="submitSellerinfo" value="{l s='Save' mod='agilemultipleseller'}">
		<i class="icon-save"></i>&nbsp;<span>{l s='Save your info' mod='agilemultipleseller'}</span></button>
	</div>


	<div class="form-group">
      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 file_upload_label">
        <span class="label-tooltip" data-toggle="tooltip"
          title="{l s='Format:' mod='agilemultipleseller'} JPG, GIF, PNG.">
          {l s='Add a logo image'  mod='agilemultipleseller'}
        </span>
      </label>
      <div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-12 agile-col-xl-12">
			<div class="row">
				<div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-9 agile-col-xl-9">
					<input name="logo[]" id="logo" type="file" multiple class="form-control file" data-overwrite-initial="false" data-min-file-count="1">
				</div>
			</div>
      </div>
    </div>


    <script type="text/javascript">

			$("#logo").fileinput({
				width: '50px',
		        uploadUrl: baseDir + 'modules/ajax.php?seller_id={$sellerinfo->id}', // you must set a valid URL here else you will get an error
		        allowedFileExtensions : ['jpg', 'png','gif', 'jpeg'],
		        overwriteInitial: false,
		        maxFileSize: 25000,
		        maxFilesNum: 10,
		        //allowedFileTypes: ['image', 'video', 'flash'],
		        slugCallback: function(filename) {
		            return filename.replace('(', '_').replace(']', '_');
		        }
			});

			$('#logo').on('filebatchuploadcomplete', function(event, files, extra) {
			    console.log('File batch upload complete');
			    // location.reload();
			     $('.save-guide1').click();
			});

	</script>


	<div class="form-group">

	</div>
	{if $sellerinfo->images_path|@count > 0}
	<div class="form-group">
		<label for="seller_images" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Show Logo\'s'  mod='agilemultipleseller'}</span> <br/><br/>
			
			<span><small>{l s='Please take your main picture'  mod='agilemultipleseller'}</small></span>
			
		</label>
		{* The logo image is always use the orignal size of logo image, please use either width OR height to display size  *}
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			{* <div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
				</div>
			</div> *}

			<div class="row" id="thumb_list">
				{foreach from=$sellerinfo->images_path key=k item=imagePath}
				<div class="col-lg-3 col-md-4 col-xs-6 thumb" >
					<a class="thumbnail" href="#content{$k}" id="{$k}" sellerId="{$sellerinfo->id_sellerinfo}">
						<img class="img-responsive" src="{$imagePath}" alt="">
	                </a>    

	                <input class="thumbnail2" id="active_{$k}" type="radio" name="active_img" value="{$k}" sellerId="{$sellerinfo->id_sellerinfo}">Active<br/>
	                <div style="float:right; position:relative; bottom:15px" class="agile-btn agile-btn-default logo-del" value="{$k}" sellerId="{$sellerinfo->id_sellerinfo}" path="{$imagePath}">

	                <i id="del" class="icon-delete"></i>&nbsp;<span>Delete</span></div>
					
				</div>
				{/foreach}
	    	</div>

		</div>
	</div>
	{/if}

	<script type="text/javascript">

	$(document).ready(function() {
		// Change Active Thumbnail
		$('#thumb_list')
			.delegate('a.thumbnail','click', function() {
			var   id = $(this).attr('id'),
			sellerId = $(this).attr('sellerId');
			$('#active_' + id).prop('checked', true);

			// $('button[type=submit]').click(function() {

					var query = $.ajax({
					  type: 'POST',
					  url: baseDir + 'modules/ajax.php',
					  data: 'process=1&id_data='+id+'&seller_id=' + sellerId,
					  success: function(json) {
					  	console.log(json);
					  }
					});

				// });
		
			})
			.delegate('input.thumbnail2', 'click', function() {
			var   id = $(this).attr('value'),
			sellerId = $(this).attr('sellerId');

			$('button[type=submit]').click(function() {

					var query = $.ajax({
					  type: 'POST',
					  url: baseDir + 'modules/ajax.php',
					  data: 'process=1&id_data='+id+'&seller_id=' + sellerId,
					  success: function(json) {

					  }
					});

				});

			});


		// Delete Logo
		$('#thumb_list').delegate('.logo-del','click', function() {

			var   id2 = $(this).attr('value'),
			sellerId2 = $(this).attr('sellerId'),
			url 	 = $(this).attr('path');
			var ans = confirm("Are you sure you want to delete?");
			if (ans == true) {

			    $.ajax({
				  type: 'POST',
				  url: baseDir + 'modules/ajax.php',
				  data: 'process=2&id_data='+id2+'&seller_id=' + sellerId2 + '&url=' + url,
				  success: function(json) {
				  	var obj = jQuery.parseJSON(json);
				  	$('#thumb_list').empty();

				  	$.each(obj.image, function(index, value) {
				  		 // console.log('key: ' + index + ' value: ' + value);
				  		
				  		 var html = '<div class="col-lg-3 col-md-4 col-xs-6 thumb" ><a class="thumbnail" href="#content' +index + '" id="' +index + '" sellerId="'+obj.seller_id+'"><img class="img-responsive" src="'+ baseDir + 'img/as/'+obj.seller_id+'/' + value +'" /></a><input id="active_'+index +'" type="radio" name="active_img" value="'+index +'">Active<br><div style="float:right; position:relative; bottom:15px" class="agile-btn agile-btn-default logo-del" value="'+index +'" sellerId="'+obj.seller_id+'" path="'+ baseDir + 'img/as/'+obj.seller_id+'/' + value +'"><i id="del" class="icon-delete"></i>&nbsp;<span>Delete</span></div></div>';

				  		 $('#thumb_list').append(html);
				  	});
			    	// console.log(json);
				  }
				});

			   // window.location = window.location.href;

			}

			return false;
		});

	});
	</script>

	<div class="form-group">
		<label for="seller_logo" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Active logo'  mod='agilemultipleseller'}</span>
		</label>
		{* The logo image is always use the orignal size of logo image, please use either width OR height to display size  *}
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9 ">
					<img src="{$sellerinfo->get_seller_logo_url2()}" alt="{l s='Your Logo' mod='agilemultipleseller'}" class="agile-col-xs-8 agile-col-sm-8 agile-col-md-8 agile-col-lg-8 thumbnail" title="{l s='Your Logo' mod='agilemultipleseller'}" id="seller_logo" name="seller_logo" />

				</div>
			</div>
		</div>
	</div>

	



	{* LICENSE *}
	



	<div class="form-group">
      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 file_upload_label">
        <span class="label-tooltip" data-toggle="tooltip"
          title="{l s='Format:' mod='agilemultipleseller'} JPG, GIF, PNG.">
          {l s='Add a license image'  mod='agilemultipleseller'}
        </span>
      </label>
      <div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-12 agile-col-xl-12">
			<div class="row">
				<div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-9 agile-col-xl-9">
					<input name="license[]" id="license" type="file" multiple class="form-control file" data-overwrite-initial="false" data-min-file-count="1">
					<br/>
					{* <small style="background:#EDF7FB; padding: 3px;">
					<b>
					{l s='ID with picture is required, other license that is related with the offered services will be needed.' mod='agilemultipleseller' }
					</b>
					</small> *}
				</div>
			</div>
      </div>
    </div>


    <script type="text/javascript">

    	$(document).ready(function() {
    			var msg = "{l s='ID with picture is required, other license that is related with the offered services will be needed.' mod='agilemultipleseller' }";
    			$('.file-drop-zone-title').eq(1).append('<p style="font-size:12px">'+ msg +'</p>');
    		});

			$("#license").fileinput({
		        uploadUrl: baseDir + 'modules/ajax_license.php?seller_id={$sellerinfo->id}', // you must set a valid URL here else you will get an error
		        allowedFileExtensions : ['jpg', 'png','gif', 'jpeg'],
		        overwriteInitial: false,
		        maxFileSize: 25000,
		        maxFilesNum: 10,
		        //allowedFileTypes: ['image', 'video', 'flash'],
		        slugCallback: function(filename) {
		            return filename.replace('(', '_').replace(']', '_');
		        }
			});

			$('#license').on('filebatchuploadcomplete', function(event, files, extra) {
			    console.log('File batch upload complete');
			    // location.reload();
			    $('#save-guide').click();
			});

	</script>
	{if $sellerinfo->getLicenseImages()|@count > 0}
	<div class="form-group">
		<label for="seller_license_img" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Show License'  mod='agilemultipleseller'}</span>
		</label>
		{* The logo image is always use the orignal size of logo image, please use either width OR height to display size  *}
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="row" id="thumb_list">
				{foreach from=$sellerinfo->getLicenseImages() key=k item=img}
				<div class="col-lg-3 col-md-4 col-xs-6 thumb" id="license_{$img['id']}">
					<a class="thumbnail">
					<img class="img-responsive" src="{$sellerinfo->get_seller_license_url()}/{$img['name']}" >
					</a>
					<div class="agile-btn agile-btn-default logo-del-silence" value="{$img['id']}" license="{$img['name']}">
					<i id="del" class="icon-delete"></i>&nbsp;<span>Delete</span>
					</div>
				</div>
				{/foreach}
	    	</div>
			</div>
		</div>
	</div>
	{/if}
	<script type="text/javascript">

	$(document).ready(function() {
		$('.logo-del-silence').on('click', function() {
			var name = $(this).attr('license'),
				id = $(this).attr('value');

			var ans = confirm("Are you sure you want to delete?");
			if (ans == true) {
				$.ajax({
					'type': 'POST',
					'data': 'id=' + id + '&name='+ name  + '&id_seller=' + '{$sellerinfo->id}',
					'url': baseDir + 'modules/ajax_delete_license.php',
					success: function(data) {
						// console.log(data);
						var obj = jQuery.parseJSON(data);
						console.log(obj);
				  		$.each(obj, function(index, value) {
				  			var license_id = value.id;
				  			console.log('#license_'+license_id);
				  			$('#license_'+license_id).remove();
				  		});
					}
				});
			}
		});
	});

	</script>

    {* <div class="form-group">
		<label for="license" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='License' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<input type="text" id="license" name="license" class="form-control" value="{if isset($smarty.post.license)}{$smarty.post.license}{else}{if isset($sellerinfo->license)}{$sellerinfo->license|escape:'htmlall':'UTF-8'}{/if}{/if}" class="form-control" />
				</div>
			</div>
		</div>
	</div>
 *}
	

  

  <!-- START GOOGLE MAP -->
	{* <div class="form-group">
		<label for="longitude" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Longitude' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3 agile-col-xl-2">
					<input type="text" id="longitude" name="longitude" class="form-control" value="{if isset($smarty.post.longitude)}{$smarty.post.longitude}{else}{if isset($sellerinfo->longitude)}{$sellerinfo->longitude|escape:'htmlall':'UTF-8'}{/if}{/if}" />
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="latitude" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Latitude' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3 agile-col-xl-2">
					<input type="text" id="latitude" name="latitude" class="form-control" value="{if isset($smarty.post.latitude)}{$smarty.post.latitude}{else}{if isset($sellerinfo->latitude)}{$sellerinfo->latitude|escape:'htmlall':'UTF-8'}{/if}{/if}" />
				</div>
			</div>
		</div>
	</div>

	{for $i=1 to 10}
		{if $conf[sprintf("AGILE_MS_SELLER_TEXT%s",$i)]}
			{$field_name = sprintf("ams_custom_text%s",$i)}
			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="{$field_name}_{$current_id_lang}">
					<span>
						{$custom_labels[$field_name]}
					</span>
				</label>
				<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
					{include file="$agilemultipleseller_views/templates/front/products/input_text_lang.tpl"
						languages=$languages
						input_value=$sellerinfo->{$field_name}
						input_name={$field_name}
					}
				</div>
			</div>
		{/if}
	{/for}  

	{for $i=1 to 2}
		{if $conf[sprintf("AGILE_MS_SELLER_HTML%s",$i)]}
			{$field_name = sprintf("ams_custom_html%s",$i)}
			<div class="form-group">
				<label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="{$field_name}_{$current_id_lang}">
					  <span>
							{$custom_labels[$field_name]}
					  </span>
				</label>
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					{include file="$agilemultipleseller_views/templates/front/products/textarea_lang.tpl"
							languages=$languages
							input_name={$field_name}
							input_value=$sellerinfo->{$field_name}
							class="rte"
							max=400}
					</div>
				</div>
		{/if}
	{/for}  
	{for $i=1 to 10}
		{if $conf[sprintf("AGILE_MS_SELLER_NUMBER%s",$i)]}
			{$field_name = sprintf("ams_custom_number%s",$i)}
			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="{$field_name}">
					<span>
						{$custom_labels[$field_name]}
					</span>
				</label>
				<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
					<div class="row">
						<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
							<input type="text" id="{$field_name}" name="{$field_name}" 
								value="{if isset($smarty.post[$field_name])}{$smarty.post[$field_name]}{else}{if isset($sellerinfo->{$field_name})}{$sellerinfo->{$field_name}|escape:'htmlall':'UTF-8'}{/if}{/if}" />
						</div>
					</div>
				</div>
			</div>
		{/if}
    {/for}  
	{for $i=1 to 5}
		{if $conf[sprintf("AGILE_MS_SELLER_DATE%s",$i)]}
			{$field_name = sprintf("ams_custom_date%s",$i)}
			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="{$field_name}">
					<span>
						{$custom_labels[$field_name]}
					</span>
				</label>
				<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
					<div class="row">
						<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
							<input type="text" id="{$field_name}" name="{$field_name}" class="datepicker"
								value="{if isset($smarty.post[$field_name])}{$smarty.post[$field_name]}{else}{if isset($sellerinfo->{$field_name})}{$sellerinfo->{$field_name}|escape:'htmlall':'UTF-8'}{/if}{/if}" />
						</div>
					</div>
				</div>
			</div>
		{/if} 
    {/for}  

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span>{l s='Map' mod='agilemultipleseller'}</span>
		</label>
		<div class=" agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
			<div class="row">
				<div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-12 agile-col-xl-12">
					{include file="$agilemultipleseller_views./templates/googlemap.tpl"}
				</div>
			</div>
		</div>
	</div> *}

	 <!-- END GOOGLE MAP -->

	<div>
		<input type="hidden" name="id_sellerinfo" value="{$sellerinfo->id|intval}" />
		<input type="hidden" name="id_customer" value="{$sellerinfo->id_customer|intval}" />
		{if isset($select_address)}<input type="hidden" name="select_address" value="{$select_address|intval}" />{/if}
	</div>	
	<div class="form-group agile-align-center">
		<span class="label-tooltip pull-right"> <sup>*</sup> {l s='Required field' mod='agilemultipleseller'}</span>
		<button id="save-guide" type="submit" style="margin-top:50px;" class="agile-btn agile-btn-default" name="submitSellerinfo" value="{l s='Save' mod='agilemultipleseller'}">
		<i class="icon-save"></i>&nbsp;<span>{l s='Save your photo' mod='agilemultipleseller'}</span></button>
	</div>
</form>
{addJsDefL name='sellerbusiness_fileDefaultHtml'}{l s='No file selected' mod='agilemultipleseller' js=1}{/addJsDefL}
{addJsDefL name='sellerbusiness_fileButtonHtml'}{l s='Choose File' mod='agilemultipleseller' js=1}{/addJsDefL}


{*$default_language*}
<script type="text/javascript">
    hideOtherLanguage({$current_id_lang});
</script>


{/if}
</div> <!-- panel -->
</div> <!-- bootstrap -->
{include file="$agilemultipleseller_views./templates/front/seller_footer.tpl"}

