<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:12
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookbreadcrumb-shops.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132043253155bf24789d6fd8-66259823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56d12f81b2e4f7446015c9656befc6b8e96d4c50' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookbreadcrumb-shops.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132043253155bf24789d6fd8-66259823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir_default' => 0,
    'seller_shop' => 0,
    'isat_seller_home' => 0,
    'navigationPipe' => 0,
    'seller_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf2478a18b45_04291550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf2478a18b45_04291550')) {function content_55bf2478a18b45_04291550($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_default']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Main Shop','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Main Shop','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a>
<?php if (isset($_smarty_tpl->tpl_vars['seller_shop']->value)&&$_smarty_tpl->tpl_vars['seller_shop']->value) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['isat_seller_home']->value)&&$_smarty_tpl->tpl_vars['isat_seller_home']->value==0) {?>
		<span class="navigation-pipe"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navigationPipe']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
		<a href="<?php echo $_smarty_tpl->tpl_vars['seller_shop']->value->getBaseURL();?>
"><?php echo $_smarty_tpl->tpl_vars['seller_name']->value;?>
</a>
	<?php }?>
<?php }?>
<?php }} ?>
