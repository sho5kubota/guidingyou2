<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207553929655bf247ab83d43-83917895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c60ebbaef085483fb919e478e3edf8ec577ad7f7' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/header.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207553929655bf247ab83d43-83917895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_defer' => 0,
    'js_files' => 0,
    'js_def' => 0,
    'js_uri' => 0,
    'HOOK_HEADER' => 0,
    'js_dir' => 0,
    'css_dir' => 0,
    'page_name' => 0,
    'body_classes' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'link' => 0,
    'new_categories' => 0,
    'category' => 0,
    'cat' => 0,
    'HOOK_TOP' => 0,
    'left_column_size' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'right_column_size' => 0,
    'cols' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247ae6b7e3_37821136',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247ae6b7e3_37821136')) {function content_55bf247ae6b7e3_37821136($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include '/Applications/MAMP/htdocs/testguidingyou2/tools/smarty/plugins/function.implode.php';
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>

		<meta charset="utf-8" />
		<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value) {?>
		<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value) {?>
		<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)) {?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value) {?>no<?php }?>follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['css_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['media']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['js_defer']->value)&&!$_smarty_tpl->tpl_vars['js_defer']->value&&isset($_smarty_tpl->tpl_vars['js_files']->value)&&isset($_smarty_tpl->tpl_vars['js_def']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['js_def']->value;?>

	<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
"></script>
	<?php } ?>
<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>

		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
wow.min.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
fileinput.min.js"></script>
		<script>new WOW().init();</script>  
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
animate.css" type="text/css" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
fileinput.css" type="text/css" />
		<link rel="stylesheet" href="http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />
		<link href="http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
		<link href="http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=Bitter:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
			<link href="http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=Roboto:400,100,200,300,500,600,700,800,900" rel='stylesheet' type='text/css' media="all">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if IE 8]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
		$(document).ready(function() {
			$('#select-cat div').first().removeClass('selector');
			$('#select-cat span').first().remove();
		});
		</script>
	</head>
	
	<body<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?> id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['body_classes']->value)&&count($_smarty_tpl->tpl_vars['body_classes']->value)) {?> <?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['body_classes']->value,'separator'=>' '),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value) {?> hide-left-column<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value) {?> hide-right-column<?php }?><?php if (isset($_smarty_tpl->tpl_vars['content_only']->value)&&$_smarty_tpl->tpl_vars['content_only']->value) {?> content_only<?php }?> lang_<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value) {?>
			<div id="restricted-country">
				<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['geolocation_country']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></p>
			</div>
		<?php }?>
		<div class="auth-form"><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./authentication-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
		<div class="clearfix"></div>
		<div id="page">
		
			<div class="header-container">
			
		<div class="clearfix"></div>
		
				<header id="header" >
					<div class="banner">
						<div class="container">
							<div class="row">
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBanner"),$_smarty_tpl);?>

							</div>
						</div>
					</div>
					<div class="nav">
						<div class="container">
							<div class="row">
								<nav><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav"),$_smarty_tpl);?>
</nav>
							</div>
						</div>
					</div>
					<div>
						<div class="container">

							<div class="col-xs-12 col-sm-12 col-md-12" >

								<div class="row">

									<div class="col-xs-12 col-sm-12 col-md-4 " >
									
										<a href="/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
											<img class="logo img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?> />
										</a>
									</div>
									
									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" />
										<form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" >
										<input type="hidden" name="controller" value="search" />
                                        <input type="hidden" name="orderby" value="position" />
                                        <input type="hidden" name="orderway" value="desc" />

										<input type="text" class="form-control col-xs-12 input-search-top" placeholder="Country and City" id="search_query_top" name="search_loc" >
					
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" id="select-cat"/>
										<select class="form-control input-search-top" name="search_cat">
											<option value="0">Guide and Activity</option>
									            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
									            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['category']->value['name_main'];?>
">
									              <?php if (count($_smarty_tpl->tpl_vars['category']->value['child'])>0) {?>
									                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
									                  <option  
									                   <?php if (Tools::getValue('search_cat')==$_smarty_tpl->tpl_vars['cat']->value['id_category']) {?>
									                    selected="selected"
									                    <?php }?>
									                  value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
">
									                  <?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>

									              	  </option>
									                <?php } ?>
									              <?php }?>
									            </optgroup>
									            <?php } ?>
										</select>						
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 nopadding" />
										 <input class="form-control input-search-top" type="text" id="" name="search_words" 
                                             <?php if (!empty(Tools::getValue('search_words'))) {?>
                                            	value="<?php echo Tools::getValue('search_words');?>
" 
                                            <?php }?>
                                            placeholder="Free Word"
                                            />
									</div>
									<input type='submit' style='display: inline-block ;float:left; height:1px; width:1px; visibility:hidden;position:absolute';  /> 
									</form>
									<?php if (isset($_smarty_tpl->tpl_vars['HOOK_TOP']->value)) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>
<?php }?>


	                               

                                </div>
								
							</div> <!-- end row -->
						</div>
					</div>
				</header>
			</div>

			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"FrontSearch"),$_smarty_tpl);?>


			<div class="columns-container">
			<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopColumn"),$_smarty_tpl);?>
</div>
					</div>
				<div id="columns" class="container">
					<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='pagenotfound') {?>
						<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					<?php }?>
					
					<div class="row">
						<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['left_column_size']->value)) {?>
						<div id="left_column" class="column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['left_column_size']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>
</div>
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&isset($_smarty_tpl->tpl_vars['right_column_size']->value)) {?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable((12-$_smarty_tpl->tpl_vars['left_column_size']->value-$_smarty_tpl->tpl_vars['right_column_size']->value), null, 0);?><?php } else { ?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable(12, null, 0);?><?php }?>


						<div id="center_column" class="center_column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['cols']->value);?>
">
	<?php }?><?php }} ?>
