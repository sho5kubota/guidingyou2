<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 15:07:31
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerbusiness.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59245089255c064b363fd32-66626282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2832869f90f1c2bdf963344ca6a782492544882d' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerbusiness.tpl',
      1 => 1438671963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59245089255c064b363fd32-66626282',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'isoTinyMCE' => 0,
    'ad' => 0,
    'sellerinfo' => 0,
    'countries' => 0,
    'base_dir' => 0,
    'seller_exists' => 0,
    'token' => 0,
    'current_id_lang' => 0,
    'languages' => 0,
    'is_multiple_shop_installed' => 0,
    'seller_shop' => 0,
    'seller_shopurl' => 0,
    'countries_list' => 0,
    'k' => 0,
    'langs' => 0,
    'language' => 0,
    'langs_list' => 0,
    'imagePath' => 0,
    'img' => 0,
    'select_address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c064b3b1cad7_87842359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c064b3b1cad7_87842359')) {function content_55c064b3b1cad7_87842359($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account.php');?>
"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<div id="agile">
<div class="panel">
<h1 class="withAdditional"><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h1>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('22','whats-guide-member'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink"><?php echo smartyTranslate(array('s'=>'Explanation of guide membar','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <script type="text/javascript">	
        var iso = "<?php echo $_smarty_tpl->tpl_vars['isoTinyMCE']->value;?>
";
        var pathCSS = '<?php echo @constant('_THEME_CSS_DIR_');?>
';
        var ad = "<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
";

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
        		
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <script type="text/javascript">
    idSelectedCountry = <?php if (isset($_POST['id_state'])) {?> {
    	$smarty.post.id_state|intval
    }
    <?php } else { ?>
	    <?php if (isset($_smarty_tpl->tpl_vars['sellerinfo']->value->id_state)) {?>
	    	<?php echo intval($_smarty_tpl->tpl_vars['sellerinfo']->value->id_state);?>

    	<?php } else { ?> 
    		false
    	<?php }?>

    <?php }?>;

		<?php if (isset($_smarty_tpl->tpl_vars['countries']->value)) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('agileCountries'=>$_smarty_tpl->tpl_vars['countries']->value),$_smarty_tpl);?>

		<?php }?>


    </script>

	<script language="javascript" type="text/javascript">
		function changeMyLanguage(field, fieldsString, id_language_new, iso_code)
		{
			changeLanguage(field, fieldsString, id_language_new, iso_code);
			$("img[id^='language_current_']").attr("src","<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/l/" + id_language_new + ".jpg");
		}
	</script>


<?php if (isset($_smarty_tpl->tpl_vars['seller_exists']->value)&&$_smarty_tpl->tpl_vars['seller_exists']->value) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerbusiness',array(),true);?>
" enctype="multipart/form-data" method="post" class="form-horizontal std">
        <h3 class="withAdditional"><?php echo smartyTranslate(array('s'=>'Your business information','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h3>
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('23','how-to-enter-guide-information'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink" style="font-size:1.2em;"><?php echo smartyTranslate(array('s'=>'How to enter your Guide information','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>

        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
	
	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="company_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
			<span>
				<?php echo smartyTranslate(array('s'=>'Company','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['sellerinfo']->value->company,'input_name'=>'company'), 0);?>

		</div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['is_multiple_shop_installed']->value) {?>

		<div class="form-group">
		
		<input type="hidden" id="shop_name" name="shop_name" class="form-control" value="<?php if (isset($_POST['shop_name'])) {?><?php echo $_POST['shop_name'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['seller_shop']->value->name)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['seller_shop']->value->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" class="form-control" />
					
		</div>

		<div class="form-group">
			<label for="shop_url" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
				<span><?php echo smartyTranslate(array('s'=>'Shop full Url','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
				<div class="row">
					<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
						<input type="text" id="shop_url" name="shop_url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['seller_shopurl']->value->getURL();?>
" disabled=true class="form-control" />
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
		
		
		<input type="hidden" id="virtual_uri" name="virtual_uri"  class="form-control" value="<?php if (isset($_POST['virtual_uri'])) {?><?php echo $_POST['virtual_uri'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['seller_shopurl']->value)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['seller_shopurl']->value->virtual_uri, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" class="form-control" />
	
		</div>

		

	<?php }?>



	


	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="address1_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
			<span>
				<?php echo smartyTranslate(array('s'=>'Address','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['sellerinfo']->value->address1,'input_name'=>'address1'), 0);?>

		</div>
	</div>

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="address2_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
			<span>
				<?php echo smartyTranslate(array('s'=>'Address (Line 2)','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['sellerinfo']->value->address2,'input_name'=>'address2'), 0);?>

		</div>
	</div>

	

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="city_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
			<span>
				<?php echo smartyTranslate(array('s'=>'City','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			</span>
		</label>
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['sellerinfo']->value->city,'input_name'=>'city'), 0);?>

		</div>
	</div>

	<div class="form-group id_state">
		<label for="id_state" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
			<span><?php echo smartyTranslate(array('s'=>'State','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
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
			<span><?php echo smartyTranslate(array('s'=>'Country','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<select id="id_country" name="id_country"><?php echo $_smarty_tpl->tpl_vars['countries_list']->value;?>
</select>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="postcode" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span><?php echo smartyTranslate(array('s'=>'Postal Code','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3">
					<input type="text" id="postcode" name="postcode" class="form-control" value="<?php if (isset($_POST['postcode'])) {?><?php echo $_POST['postcode'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['sellerinfo']->value->postcode)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['sellerinfo']->value->postcode, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" class="form-control" />
				</div>
			</div>
		</div>
	</div>


	<div class="form-group">
		<label for="phone" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
			<span><?php echo smartyTranslate(array('s'=>'Phone','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		</label>
		<div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<input type="text" id="phone" name="phone" class="form-control" value="<?php if (isset($_POST['phone'])) {?><?php echo $_POST['phone'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['sellerinfo']->value->phone)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['sellerinfo']->value->phone, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" class="form-control" />
				</div>
			</div>
		</div>
	</div>

	
	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="language_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
			<span>
				<?php echo smartyTranslate(array('s'=>'Language','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			</span>
		</label>
		<div class=" agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5" id="lang-append">
		<?php if (!empty($_smarty_tpl->tpl_vars['sellerinfo']->value->language_count[0])) {?>
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sellerinfo']->value->language_count; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
				<div class="row lang-row"  id="lang-div<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
					<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5">
						<select id="lang[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" name="lang[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]">
							<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['langs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
							
								<option <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sellerinfo']->value->language_count[$_tmp3]==$_smarty_tpl->tpl_vars['language']->value['name']) {?> selected="selected"<?php }?>
								value="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>

								</option>
							<?php } ?>
							
						</select>
					</div>
					<div class="row" >
						<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5">
							<select id="lang_level[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" name="lang_level[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]"  width="5">
								<option <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sellerinfo']->value->language_count_level[$_tmp4]=='Basic') {?> selected="selected"<?php }?> value="Basic">Basic</option>
								<option <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php $_tmp5=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sellerinfo']->value->language_count_level[$_tmp5]=='Business') {?> selected="selected"<?php }?> value="Business">Business</option>
								<option <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php $_tmp6=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['sellerinfo']->value->language_count_level[$_tmp6]=='Native') {?> selected="selected"<?php }?> value="Native">Native</option>
							</select>


							

						</div>
							
							
							<div style="position:relative; right:25px; top:2px" class="agile-col-sm-1 agile-col-md-1 agile-col-lg-1 agile-col-xl-1">
								<button  key="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="button-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
					

					</div>
				</div>
			<?php } ?>
			<?php }?>
		</div>
	</div>

	

	<div class="form-group">
		<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="language_add">
			<span>
				<?php echo smartyTranslate(array('s'=>'Add new language','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

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
							'data': 'key='+key +'&id_seller='+'<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id;?>
',
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

						var lang_html = '<div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5"><select id="lang['+x+']" name="lang['+x+']"><option><?php echo $_smarty_tpl->tpl_vars['langs_list']->value;?>
</option><option value="Other Language">Other Language</option></select></div>';

						var html = '<div class="row"><div class="agile-col-sm-5 agile-col-md-5 agile-col-lg-5 agile-col-xl-5"><select id="lang_level['+x+']" name="lang_level['+x+']"  width="5"><option value="Basic">Basic</option><option value="Business">Business</option><option value="Native">Native</option></select></div><div class="agile-col-sm-1 agile-col-md-1 agile-col-lg-1 agile-col-xl-1" style="position:relative; right:25px; top:2px"><button key="'+x+'" id="button-'+x+'" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
						
						$('#lang-append').append('<div class="row lang-row" id="lang-div'+x+'">'+lang_html + html+'</div>');
						
						x++;

					});

				});

			</script>
	
  <div class="form-group">
    <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="description_<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
">
      <span>
        <?php echo smartyTranslate(array('s'=>'Description','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
	<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
			<div style="display: <?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['current_id_lang']->value ? 'block' : 'none';?>
;" class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
 row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<textarea class="rte" id="description_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" aria-hidden="true" name="description_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" cols="26" rows="13"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp7=ob_get_clean();?><?php if (isset($_POST['description'][$_tmp7])) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp8=ob_get_clean();?><?php echo $_POST['description'][$_tmp8];?>
<?php } else { ?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp9=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['sellerinfo']->value->description[$_tmp9])) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp10=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['sellerinfo']->value->description[$_tmp10], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?></textarea>
				</div>
				
			</div>
		<?php } ?>
	</div>
  </div>
  <div class="form-group agile-align-center" style="border-bottom:3px solid rgb(27,	166,	229)	;margin-bottom:40px;">
		<span class="label-tooltip pull-right"> <sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		<button class="save-guide1" type="submit" style="margin-top:20px;margin-bottom:40px;" class="agile-btn agile-btn-default" name="submitSellerinfo" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
		<i class="icon-save"></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Save your info','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span></button>
	</div>


	<div class="form-group">
      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 file_upload_label">
        <span class="label-tooltip" data-toggle="tooltip"
          title="<?php echo smartyTranslate(array('s'=>'Format:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 JPG, GIF, PNG.">
          <?php echo smartyTranslate(array('s'=>'Add a logo image','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

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
		        uploadUrl: baseDir + 'modules/ajax.php?seller_id=<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id;?>
', // you must set a valid URL here else you will get an error
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
	<?php if (count($_smarty_tpl->tpl_vars['sellerinfo']->value->images_path)>0) {?>
	<div class="form-group">
		<label for="seller_images" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span><?php echo smartyTranslate(array('s'=>'Show Logo\'s','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span> <br/><br/>
			
			<span><small><?php echo smartyTranslate(array('s'=>'Please take your main picture','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</small></span>
			
		</label>
		
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			

			<div class="row" id="thumb_list">
				<?php  $_smarty_tpl->tpl_vars['imagePath'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imagePath']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sellerinfo']->value->images_path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imagePath']->key => $_smarty_tpl->tpl_vars['imagePath']->value) {
$_smarty_tpl->tpl_vars['imagePath']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['imagePath']->key;
?>
				<div class="col-lg-3 col-md-4 col-xs-6 thumb" >
					<a class="thumbnail" href="#content<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" sellerId="<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id_sellerinfo;?>
">
						<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['imagePath']->value;?>
" alt="">
	                </a>    

	                <input class="thumbnail2" id="active_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" type="radio" name="active_img" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" sellerId="<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id_sellerinfo;?>
">Active<br/>
	                <div style="float:right; position:relative; bottom:15px" class="agile-btn agile-btn-default logo-del" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" sellerId="<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id_sellerinfo;?>
" path="<?php echo $_smarty_tpl->tpl_vars['imagePath']->value;?>
">

	                <i id="del" class="icon-delete"></i>&nbsp;<span>Delete</span></div>
					
				</div>
				<?php } ?>
	    	</div>

		</div>
	</div>
	<?php }?>

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
			<span><?php echo smartyTranslate(array('s'=>'Active logo','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		</label>
		
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9 ">
					<img src="<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->get_seller_logo_url2();?>
" alt="<?php echo smartyTranslate(array('s'=>'Your Logo','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" class="agile-col-xs-8 agile-col-sm-8 agile-col-md-8 agile-col-lg-8 thumbnail" title="<?php echo smartyTranslate(array('s'=>'Your Logo','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" id="seller_logo" name="seller_logo" />

				</div>
			</div>
		</div>
	</div>

	



	
	



	<div class="form-group">
      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 file_upload_label">
        <span class="label-tooltip" data-toggle="tooltip"
          title="<?php echo smartyTranslate(array('s'=>'Format:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 JPG, GIF, PNG.">
          <?php echo smartyTranslate(array('s'=>'Add a license image','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

        </span>
      </label>
      <div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-12 agile-col-xl-12">
			<div class="row">
				<div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-9 agile-col-xl-9">
					<input name="license[]" id="license" type="file" multiple class="form-control file" data-overwrite-initial="false" data-min-file-count="1">
					<br/>
					
				</div>
			</div>
      </div>
    </div>


    <script type="text/javascript">

    	$(document).ready(function() {
    			var msg = "<?php echo smartyTranslate(array('s'=>'ID with picture is required, other license that is related with the offered services will be needed.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
";
    			$('.file-drop-zone-title').eq(1).append('<p style="font-size:12px">'+ msg +'</p>');
    		});

			$("#license").fileinput({
		        uploadUrl: baseDir + 'modules/ajax_license.php?seller_id=<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id;?>
', // you must set a valid URL here else you will get an error
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
	<?php if (count($_smarty_tpl->tpl_vars['sellerinfo']->value->getLicenseImages())>0) {?>
	<div class="form-group">
		<label for="seller_license_img" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
			<span><?php echo smartyTranslate(array('s'=>'Show License','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		</label>
		
		<div class="agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
			<div class="row">
				<div class="row" id="thumb_list">
				<?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sellerinfo']->value->getLicenseImages(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['img']->key;
?>
				<div class="col-lg-3 col-md-4 col-xs-6 thumb" id="license_<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
">
					<a class="thumbnail">
					<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->get_seller_license_url();?>
/<?php echo $_smarty_tpl->tpl_vars['img']->value['name'];?>
" >
					</a>
					<div class="agile-btn agile-btn-default logo-del-silence" value="<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
" license="<?php echo $_smarty_tpl->tpl_vars['img']->value['name'];?>
">
					<i id="del" class="icon-delete"></i>&nbsp;<span>Delete</span>
					</div>
				</div>
				<?php } ?>
	    	</div>
			</div>
		</div>
	</div>
	<?php }?>
	<script type="text/javascript">

	$(document).ready(function() {
		$('.logo-del-silence').on('click', function() {
			var name = $(this).attr('license'),
				id = $(this).attr('value');

			var ans = confirm("Are you sure you want to delete?");
			if (ans == true) {
				$.ajax({
					'type': 'POST',
					'data': 'id=' + id + '&name='+ name  + '&id_seller=' + '<?php echo $_smarty_tpl->tpl_vars['sellerinfo']->value->id;?>
',
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

    
	

  

  <!-- START GOOGLE MAP -->
	

	 <!-- END GOOGLE MAP -->

	<div>
		<input type="hidden" name="id_sellerinfo" value="<?php echo intval($_smarty_tpl->tpl_vars['sellerinfo']->value->id);?>
" />
		<input type="hidden" name="id_customer" value="<?php echo intval($_smarty_tpl->tpl_vars['sellerinfo']->value->id_customer);?>
" />
		<?php if (isset($_smarty_tpl->tpl_vars['select_address']->value)) {?><input type="hidden" name="select_address" value="<?php echo intval($_smarty_tpl->tpl_vars['select_address']->value);?>
" /><?php }?>
	</div>	
	<div class="form-group agile-align-center">
		<span class="label-tooltip pull-right"> <sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
		<button id="save-guide" type="submit" style="margin-top:50px;" class="agile-btn agile-btn-default" name="submitSellerinfo" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
		<i class="icon-save"></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Save your photo','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span></button>
	</div>
</form>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'sellerbusiness_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'sellerbusiness_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','mod'=>'agilemultipleseller','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'sellerbusiness_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'sellerbusiness_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'sellerbusiness_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','mod'=>'agilemultipleseller','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'sellerbusiness_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




<script type="text/javascript">
    hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
);
</script>


<?php }?>
</div> <!-- panel -->
</div> <!-- bootstrap -->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
