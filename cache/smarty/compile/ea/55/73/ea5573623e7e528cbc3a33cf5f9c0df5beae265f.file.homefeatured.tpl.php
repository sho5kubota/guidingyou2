<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:14:07
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36607215155c0825fe5e599-58238007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea5573623e7e528cbc3a33cf5f9c0df5beae265f' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/homefeatured/homefeatured.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36607215155c0825fe5e599-58238007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c0825fe85d39_45394668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0825fe85d39_45394668')) {function content_55c0825fe85d39_45394668($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
<span class="homepage-products-title"><h2><?php echo smartyTranslate(array('s'=>'Popular Tours'),$_smarty_tpl);?>
</h2></span>
<!--<div id="homefeatured" class="tab-pane homefeatured">	-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"homefeatured",'class'=>'homefeatured bxslider4 tab-pane  '), 0);?>

<!--</div>-->
<?php } else { ?>
<ul id="homefeatured" class="homefeatured tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
