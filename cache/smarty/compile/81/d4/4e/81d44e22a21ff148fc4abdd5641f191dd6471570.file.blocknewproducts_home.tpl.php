<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:13
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blocknewproducts/blocknewproducts_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64008318655bf24795caec6-12298018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81d44e22a21ff148fc4abdd5641f191dd6471570' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blocknewproducts/blocknewproducts_home.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64008318655bf24795caec6-12298018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf24795f5765_72661178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf24795f5765_72661178')) {function content_55bf24795f5765_72661178($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['new_products']->value)&&$_smarty_tpl->tpl_vars['new_products']->value) {?>
	<span class="homepage-products-title"><h2><?php echo smartyTranslate(array('s'=>'New Guide & Activity'),$_smarty_tpl);?>
</h2></span>
<!--<div id="blocknewproducts" class="tab-pane blocknewproducts">-->	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['new_products']->value,'id'=>"blocknewproducts",'class'=>'blocknewproducts tab-pane  bxslider4'), 0);?>

 <!--</div>-->
	  <?php } else { ?>
<ul id="blocknewproducts" class="blocknewproducts tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No new products at this time.','mod'=>'blocknewproducts'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
