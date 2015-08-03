<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockbestsellers/blockbestsellers-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183017365655bf247a0798e3-54921793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7241721501e70099589b26cc6bb515bbc90cfd22' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockbestsellers/blockbestsellers-home.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183017365655bf247a0798e3-54921793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'best_sellers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247a0a6e63_48030384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247a0a6e63_48030384')) {function content_55bf247a0a6e63_48030384($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['best_sellers']->value)&&$_smarty_tpl->tpl_vars['best_sellers']->value) {?>
<span class="homepage-products-title"><h2><?php echo smartyTranslate(array('s'=>'Popular Guide & Activity'),$_smarty_tpl);?>
</h2></span>
<!--<div id="blockbestsellers" class="tab-pane blockbestsellers">-->	
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['best_sellers']->value,'id'=>"blockbestsellers",'class'=>'blockbestsellers tab-pane  bxslider4 '), 0);?>

<!--</div>-->
<?php } else { ?>
<ul id="blockbestsellers" class="blockbestsellers tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No best sellers at this time.','mod'=>'blockbestsellers'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
